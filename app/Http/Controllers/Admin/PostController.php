<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\CategoryPost;

class PostController extends Controller
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
        $count = Post::count();
        $data = Post::paginate(3);
        $datacms = Post::get();
        return view('admin.post.index',["posts"=>$data, "postscms"=>$datacms, "count"=>$count]);
    }

    public function details(Request $request)
    {
        
        $data = Post::find($request->id);
        $categoryPost = CategoryPost::get();
        return view('admin.post.detail',["post"=>$data, "categories"=>$categoryPost]);
    }

    public function detailspost(Request $request)
    {
        $data = Post::find($request->id);
        $categoryPost = CategoryPost::get();
        return view('postdetail.renungan',["detailspost"=>$data, "categories"=>$categoryPost]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Post::find($request->id);
        }else{
            $data = new Post;
        }

        //store image upload
        if($request->photo){
            $path = $request->file('photo')->store('post');
            $data->photo = $path;
        }

        // update data variable
        $data->category_post_id =  $request->category_post_id;
        $data->title =  $request->title;
        $data->content =  $request->content;
        $data->excerpt =  $request->excerpt;
        $data->tanggal =  $request->tanggal;
        
        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/categoryPost')->with('success', 'Congrats Post Saved Successfully!');
        }
        return redirect('/admin/categoryPost')->with('error', 'Opps! Post Fail to Create!');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/admin/post')->with('success', 'Congrats Post Deleted Successfully');
    }

}
