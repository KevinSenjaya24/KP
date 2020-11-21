<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Jemaat;

class UserController extends Controller
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
        $count = User::count();
        $data = User::get();
        return view('admin.user.index',["users"=>$data, "count"=>$count]);
    }

    public function details(Request $request)
    {
        $data = User::find($request->id);
        $jemaat = Jemaat::get();
        return view('admin.user.detail',["user"=>$data, "jemaats"=>$jemaat]);
    }

    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = User::find($request->id);
        }else{
            $data = new User;
        }

        // update data variable
        $data->jemaat_id =  $request->jemaat_id;
        $data->name =  $request->name;
        $data->email =  $request->email;
        $data->role = $request->role;
        $approveVal=$request->active;
        if($approveVal=='on'){
            $approveVal=1;
        } else {
            $approveVal=0;
        }
        $data->active = $approveVal;
        
        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/user')->with('success', 'Congrats User Saved Successfully!');
        }
        return redirect('/admin/user')->with('error', 'Opps! User Fail to Create!');
    }

    public function approval(Request $request) {
        if($request->id){
            $data = User::find($request->id);
        }else{
            $data = new User;
        }
        $approveVal=$request->active;
        if($approveVal=='on'){
            $approveVal=1;
        } else {
            $approveVal=0;
        }
        $data->active = $approveVal;
        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/user')->with('success', 'Congrats User Saved Successfully!');
        }
        return redirect('/admin/user')->with('error', 'Opps! User Fail to Create!');
    }

    public function delete($id)
    {
        $post = User::find($id);
        $post->delete();

        return redirect('/admin/user')->with('success', 'Congrats User Deleted Successfully');
    }

}
