<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\JemaatExport;
use App\Imports\JemaatImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Jemaat;
use App\Family;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class JemaatController extends Controller
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
    public function index(Request $request)
    {
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        // $from = date($request->from);
        // $to = date($request->to);
        // $jemaatdate = Jemaat::whereBetween('tanggal_lahir', [$from, $to])->get();
        // $data = Jemaat::whereMonth('tanggal_lahir', '10')->orderByRaw('DATE_FORMAT(tanggal_lahir, "%m-%d")')->get();
        $januari = Jemaat::whereMonth('tanggal_lahir', '01')->orderBy('tanggal_lahir','desc')->get();
        $februari = Jemaat::whereMonth('tanggal_lahir', '02')->get();
        $maret = Jemaat::whereMonth('tanggal_lahir', '03')->get();
        $april = Jemaat::whereMonth('tanggal_lahir', '04')->get();
        $mei = Jemaat::whereMonth('tanggal_lahir', '05')->get();
        $juni = Jemaat::whereMonth('tanggal_lahir', '06')->get();
        $juli = Jemaat::whereMonth('tanggal_lahir', '07')->get();
        $agustus = Jemaat::whereMonth('tanggal_lahir', '08')->get();
        $september = Jemaat::whereMonth('tanggal_lahir', '09')->get();
        $oktober = Jemaat::whereMonth('tanggal_lahir', '10')->get();
        $november = Jemaat::whereMonth('tanggal_lahir', '11')->get();
        $desember = Jemaat::whereMonth('tanggal_lahir', '12')->get();
        $count = Jemaat::count();
        $data = Jemaat::get();
        $ultah = Jemaat::whereDay('tanggal_lahir', $day)->whereMonth('tanggal_lahir', $month)->get();
        return view('admin.jemaat.index',
        [
            "jemaats"=>$data, 
            "count"=>$count,
            "januari"=>$januari,
            "februari"=>$februari,
            "maret"=>$maret,
            "april"=>$april,
            "mei"=>$mei,
            "juni"=>$juni,
            "juli"=>$juli,
            "agustus"=>$agustus,
            "september"=>$september,
            "oktober"=>$oktober,
            "november"=>$november,
            "desember"=>$desember,
            "ultah"=>$ultah,
            ]);
    }

    public function indexby(Request $request)
    {
        $data = Jemaat::where();
        return view('admin.jemaat.index',["jemaats"=>$data, "count"=>$count]);
    }

    public function details(Request $request)
    {
        $data = Jemaat::find($request->id);
        $family = Family::get();
        return view('admin.jemaat.detail',["jemaat"=>$data, "families"=>$family]);
    }

    public function jemaatdetails(Request $request)
    {
        $data = Jemaat::find($request->id);
        $family = Family::get();
        return view('updateprofile',["jemaat"=>$data, "families"=>$family]);
    }

    public function updatejemaat(Request $request)
    {
      
        $data = Jemaat::find($request->id);
        
        //store image upload
        if($request->photo){
            $path = $request->file('photo')->store('jemaat');
            $data->photo = $path;
        }
            
        // update data variable
        $data->family_id =  $request->family_id;
        $data->status_keanggotaan =  $request->status_keanggotaan;
        $data->nama =  $request->nama;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tanggal_lahir =  $request->tanggal_lahir;
        $data->jenis_kelamin =  $request->jenis_kelamin;
        $data->alamat =  $request->alamat;
        $data->no_telp =  $request->no_telp;
        $data->status =  $request->status;
        $data->pekerjaan =  $request->pekerjaan;
        $data->hobi =  $request->hobi;
        $data->baptis =  $request->baptis;
        
        //record data to database
        $status = $data->save();
        //redirect with message
        if($status){
            return redirect('/update-profile/success')->with('success', 'Congrats Jemaat Saved Successfully!');
        }
        return redirect('/update-profile/failed')->with('error', 'Opps! Jemaat Fail to Create!');
    }

    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Jemaat::find($request->id);
        }else{
            $data = new Jemaat;
        }

        //store image upload
        if($request->photo){
            $path = $request->file('photo')->store('jemaat');
            $data->photo = $path;
        }
            
        // update data variable
        $data->family_id =  $request->family_id;
        $data->status_keanggotaan =  $request->status_keanggotaan;
        $data->nama =  $request->nama;
        $data->tempat_lahir =  $request->tempat_lahir;
        $data->tanggal_lahir =  $request->tanggal_lahir;
        $data->jenis_kelamin =  $request->jenis_kelamin;
        $data->alamat =  $request->alamat;
        $data->no_telp =  $request->no_telp;
        $data->status =  $request->status;
        $data->pekerjaan =  $request->pekerjaan;
        $data->hobi =  $request->hobi;
        $data->baptis =  $request->baptis;
        
        //record data to database
        $status = $data->save();
        //redirect with message
        if($status){
            return redirect('/admin/jemaat')->with('success', 'Congrats Jemaat Saved Successfully!');
        }
        return redirect('/admin/jemaat')->with('error', 'Opps! Jemaat Fail to Create!');
    }

    public function delete($id)
    {
        $jemaat = Jemaat::find($id);
        $jemaat->delete();
        return redirect('/admin/jemaat')->with('success', 'Congrats Jemaat Deleted Successfully');
    }

    public function export_excel()
	{
		return Excel::download(new JemaatExport, 'jemaat.xlsx');
    }
    
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel & upload ke folder familyExcel
		$file = $request->file('file')->store('JemaatExcel');
 
		// // membuat nama file unik
		// $nama_file = rand().$file->getClientOriginalName();
 
		// // upload ke folder file_siswa di dalam folder public
		// $file->move('file_family',$nama_file);
        $import = new JemaatImport;
        $import-> import($file);
        if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
		// import data
		(new JemaatImport)->import($file);
 
		// notifikasi dengan session
		Session::flash('sukses','Data Jemaat Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/admin/jemaat');
	}

}
