<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pelayan;
use App\Jemaat;
use App\CategoryPelayan;

class PelayanController extends Controller
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
        $count = Pelayan::count();
        $data = Pelayan::get();
        return view('admin.pelayan.index',["pelayans"=>$data, "count"=>$count]);
    }

    public function details(Request $request)
    {
        $data = Pelayan::find($request->id);
        $jemaat = Jemaat::get();
        $categoryPelayan = CategoryPelayan::get();
        return view('admin.pelayan.detail',["pelayan"=>$data, "jemaats"=>$jemaat, "categories"=>$categoryPelayan]);
    }
    

    public function update(Request $request)
    {
        $statuses = [];
        //select book
        if($request->id){
            $data = Pelayan::find($request->id);
            $data->jemaat_id =  $request->jemaat_id;
            $data->category_pelayan_id =  $request->category_pelayan_id;
            $status = $data->save();
            array_push($statuses, $status);
        }else{
            
            foreach($request->jemaat_id as $value) {
                $data = new Pelayan;
                $data->jemaat_id = $value;
                $data->category_pelayan_id =  $request->category_pelayan_id;
                $status = $data->save();
                array_push($statuses, $status);
            }
        }

        if(!in_array(false, $statuses)){
            return redirect('/admin/pelayan')->with('success', 'Congrats Post Saved Successfully!');
        }
        return redirect('/admin/pelayan')->with('error', 'Opps! Post Fail to Create!');
    }
    

    public function delete($id)
    {
        $post = Pelayan::find($id);
        $post->delete();

        return redirect('/admin/pelayan')->with('success', 'Congrats Post Deleted Successfully');
    }

}
