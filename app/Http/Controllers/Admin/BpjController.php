<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bpj;
use App\Jemaat;

class BpjController extends Controller
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
        $count = Bpj::count();
        $data = Bpj::get();
        return view('admin.bpj.index',["bpjemaat"=>$data, "count"=>$count]);
    }

    public function details(Request $request)
    {
        $data = Bpj::find($request->id);
        $jemaat = Jemaat::get();
        return view('admin.bpj.detail',["bpj"=>$data, "jemaats"=>$jemaat]);
    }

    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Bpj::find($request->id);
        }else{
            $data = new Bpj;
        }

        // update data variable
        $data->jemaat_id =  $request->jemaat_id;
        $data->divisi =  $request->divisi;
        $data->periode =  $request->periode;
        
        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/bpj')->with('success', 'Congrats BPJ Saved Successfully!');
        }
        return redirect('/admin/bpj')->with('error', 'Opps! BPJ Fail to Create!');
    }

    public function delete($id)
    {
        $post = Bpj::find($id);
        $post->delete();

        return redirect('/admin/bpj')->with('success', 'Congrats BPJ Deleted Successfully');
    }
}
