<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LaguIbadah;
use App\Lagu;
use App\CategoryReservation;

class LaguIbadahController extends Controller
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
        $count = LaguIbadah::count();
        $data = LaguIbadah::get();
        $lagu = Lagu::get();
        $categoryReservation = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->get();
        return view('admin.laguIbadah.index',["laguIbadahs"=>$data, "lagus"=>$lagu, "categories"=>$categoryReservation, "count"=>$count]);
    }

    public function details(Request $request)
    {
        $laguIbadah = LaguIbadah::find($request->id);
        $lagu = Lagu::get();
        $categoryReservation = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->get();
        return view('admin.laguIbadah.detail',["laguIbadah"=>$laguIbadah, "lagus"=>$lagu, "categories"=>$categoryReservation]);
    }

    public function detailslagu(Request $request)
    {
        $data = LaguIbadah::find($request->id);
        $lagu = Lagu::get();
        return view('lagu.show',["detailslagu"=>$data, "lagus"=>$lagu]);
    }

    public function update(Request $request)
    {
        $statuses = [];
        //select book
        if($request->id){
            $data = LaguIbadah::find($request->id);
            $data->lagu_id =  $request->lagu_id;
            $data->category_reservation_id =  $request->category_reservation_id;
            $status = $data->save();
            array_push($statuses, $status);
        }else{
           
            foreach($request->lagu_id as $value) {
                $data = new LaguIbadah;
                // update data variable
                $data->lagu_id =  $value;
                $data->category_reservation_id =  $request->category_reservation_id;
                $status = $data->save();
                array_push($statuses, $status);
            }
        }

        //redirect with message
        if(!in_array(false, $statuses)){
            return redirect('/admin/categoryReservation')->with('success', 'Congrats Lagu Ibadah Saved Successfully!');
        }
        return redirect('/admin/categoryReservation')->with('error', 'Opps! Lagu Ibadah Fail to Create!');
    }

    

    public function delete($id)
    {
        $post = LaguIbadah::find($id);
        $post->delete();

        return redirect('/admin/categoryReservation')->with('success', 'Congrats Lagu Ibadah Deleted Successfully');
    }
}
