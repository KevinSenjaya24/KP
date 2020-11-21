<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryPelayan;

class CategoryPelayanController extends Controller
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
        $data = CategoryPelayan::get();
        return view('admin.categoryPelayan.index',["pelayans"=>$data]);
    }

    public function details(Request $request)
    {
        $data = CategoryPelayan::find($request->id);
        return view('admin.categoryPelayan.detail',["pelayan"=>$data]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = CategoryPelayan::find($request->id);
        }else{
            $data = new CategoryPelayan;
        }

        // update data variable
        $data->category_name = $request->category_name;
        $data->ibadah = $request->ibadah;

        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/categoryPelayan')->with('success', 'Congrats Category Post Saved Successfully!');
        }
        return redirect('/admin/categoryPelayan')->with('error', 'Opps! Category Post Fail to Create!');
    }

    public function delete($id)
    {
        $categoryPost = CategoryPelayan::find($id);
        $categoryPost->delete();

        return redirect('/admin/categoryPelayan')->with('success', 'Congrats Category Post Deleted Successfully');
    }
}
