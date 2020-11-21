<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pelayanan;
use App\Pelayan;
use App\CategoryReservation;

class PelayananController extends Controller
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
        $category = CategoryReservation::find($request->id);
        $count = Pelayanan::count();
        $data = Pelayanan::get();
        $pelayan = Pelayan::get();
        return view('admin.pelayanan.index',["pelayanans"=>$data, "pelayans"=>$pelayan, "count"=>$count, "categories"=>$categoryReservation]);
    }

    public function details(Request $request)
    {
        $category = CategoryReservation::find($request->id);
        $data = Pelayanan::find($request->id);
        $pelayan = Pelayan::get();
        $categoryReservation = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->get();
        return view('admin.pelayanan.detail',["pelayanan"=>$data, "category"=>$category, "pelayans"=>$pelayan, "categories"=>$categoryReservation]);
    }

    public function update(Request $request)
    {
        $statuses = [];
        //select book
        if($request->id){
            $data = Pelayanan::find($request->id);
            $data->pelayan_id =  $request->pelayan_id;
            $data->category_reservation_id =  $request->category_reservation_id;
            $status = $data->save();
            array_push($statuses, $status);
        }else{
            // update data variable
            foreach($request->pelayan_id as $value) {
                $data = new Pelayanan;
                $data->pelayan_id =  $value;
                $data->category_reservation_id =  $request->category_reservation_id;
                $status = $data->save();
                array_push($statuses, $status);
            }
        }
        //redirect with message
        if(!in_array(false, $statuses)){
            return redirect('/admin/categoryReservation')->with('success', 'Congrats Pelayanan Saved Successfully!');
        }
        return redirect('/admin/categoryReservation')->with('error', 'Opps! Pelayanan Fail to Create!');
    }

    public function delete($id)
    {
        $post = Pelayanan::find($id);
        $post->delete();

        return redirect('/admin/categoryReservation')->with('success', 'Congrats Pelayanan Deleted Successfully');
    }

}
