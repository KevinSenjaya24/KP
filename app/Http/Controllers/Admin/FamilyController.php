<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Family;
use App\Jemaat;
use App\Exports\FamilyExport;
use Session;
use App\Imports\FamilyImport;
use Maatwebsite\Excel\Facades\Excel;

class FamilyController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Family::get();
        return view('admin.family.index',["families"=>$data]);
    }

    public function show(Request $request)
    {
        $data = Family::find($request->id);
        $jemaat = Jemaat::where('family_id', $request->id)->get();
        return view('admin.family.show',["families"=>$data, "jemaats"=>$jemaat]);
    }

    public function details(Request $request)
    {
        $data = Family::find($request->id);
        return view('admin.family.detail',["family"=>$data]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Family::find($request->id);
        }else{
            $data = new Family;
        }

        // update data variable
        $data->kepala_keluarga = $request->kepala_keluarga;
      
        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/family')->with('success', 'Congrats Family Saved Successfully!');
        }
        return redirect('/admin/family')->with('error', 'Opps! Family Fail to Create!');
    }

    public function delete($id)
    {
        $family = family::find($id);
        $family->delete();

        return redirect('/admin/family')->with('success', 'Congrats Family Deleted Successfully');
    }

    public function export_excel()
	{
		return Excel::download(new FamilyExport, 'family.xlsx');
    }
    
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel & upload ke folder familyExcel
		$file = $request->file('file')->store('FamilyExcel');
 
		// // membuat nama file unik
		// $nama_file = rand().$file->getClientOriginalName();
 
		// // upload ke folder file_siswa di dalam folder public
		// $file->move('file_family',$nama_file);
        $import = new FamilyImport;
        $import-> import($file);
        if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        dd($import->failures());
		// import data
		(new FamilyImport)->import($file);
 
		// notifikasi dengan session
		Session::flash('sukses','Data Family Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/admin/family/family');
	}

}
