<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryPost;
use App\Post;

class CategoryPostController extends Controller
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
        $data = CategoryPost::get();
        return view('admin.categoryPost.index',["categories"=>$data]);
    }

    public function details(Request $request)
    {
        $data = CategoryPost::find($request->id);
        return view('admin.categoryPost.detail',["category"=>$data]);
    }

    public function show(Request $request)
    {
        $data = CategoryPost::find($request->id);
        $post = Post::where('category_post_id', $request->id)->get();
        return view('admin.categoryPost.show',["categories"=>$data, "posts"=>$post]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = CategoryPost::find($request->id);
        }else{
            $data = new CategoryPost;
        }

        // update data variable
        $data->category_name = $request->category_name;
      


        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/categoryPost/categoryPost')->with('success', 'Congrats Category Post Saved Successfully!');
        }
        return redirect('/admin/categoryPost/categoryPost')->with('error', 'Opps! Category Post Fail to Create!');
    }

    public function delete($id)
    {
        $categoryPost = CategoryPost::find($id);
        $categoryPost->delete();

        return redirect('/admin/categoryPost/categoryPost')->with('success', 'Congrats Category Post Deleted Successfully');
    }
}
