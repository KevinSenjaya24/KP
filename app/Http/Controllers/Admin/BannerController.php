<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Alert;

class BannerController extends Controller
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
        $data = Banner::get();
        return view('admin.banner.index',["banners"=>$data]);
    }

    public function details(Request $request)
    {
        $data = Banner::find($request->id);
        return view('admin.banner.detail',["banner"=>$data]);
    }


    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = Banner::find($request->id);
        }else{
            $data = new Banner;
        }

        //store image upload
        if($request->photo){
            $path = $request->file('photo')->store('banner');
            $data->photo = $path;
        }

        // update data variable
        $data->name = $request->name;
        $data->link = $request->link;

        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/banner')->with('success', 'Congrats Banner Saved Successfully!');
        }
        return redirect('/admin/banner')->with('error', 'Opps! Banner Fail to Create!');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect('/admin/banner')->with('success', 'Congrats Banner Deleted Successfully');
    }
}
