<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lagu;

class LaguController extends Controller
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
        $data = Lagu::get();
        return view('admin.lagu.index',["lagus"=>$data]);
    }

    public function details(Request $request)
    {
        $data = Lagu::find($request->id);
        return view('admin.lagu.detail',["lagu"=>$data]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Lagu::find($request->id);
        }else{
            $data = new Lagu;
        }

        // update data variable
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->category = $request->category;
        $data->link_youtube = $request->link_youtube;

        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/lagu')->with('success', 'Congrats Lagu Saved Successfully!');
        }
        return redirect('/admin/lagu')->with('error', 'Opps! Lagu Fail to Create!');
    }

    public function delete($id)
    {
        $lagu = Lagu::find($id);
        $lagu->delete();

        return redirect('/admin/lagu')->with('success', 'Congrats Lagu Deleted Successfully');
    }
}
