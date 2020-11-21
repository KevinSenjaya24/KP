<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\CategoryReservation;
use App\Jemaat;

class ReservationController extends Controller
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
        $reservation = Reservation::get();
        return view('admin.reservation.index',["reservations"=>$reservation]);
    }

    public function details(Request $request)
    {
        $data = Reservation::find($request->id);
        $categoryReservation = CategoryReservation::get();
        $jemaat = Jemaat::get();
        return view('admin.reservation.detail',["reservation"=>$data, "categories"=>$categoryReservation, "Jemaat"=>$jemaat]);
    }


    public function update(Request $request)
    {
        
        //select book
        if($request->id){
            $data = Reservation::find($request->id);
        }else{
            
            $data = new Reservation;
        }

        //store image upload
        if($request->photos){
            $path = $request->file('photos')->store('post');
            $data->photos = $path;
        }

        // update data variable
        
        $data->category_reservation_id =  $request->category_reservation_id;
        $data->jemaat_id =  $request->jemaat_id;
        $data->jumlah_orang =  $request->jumlah_orang;

        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/reservation')->with('success', 'Congrats Reservation Saved Successfully!');
        }
        return redirect('/admin/reservation')->with('error', 'Opps! Reservation Fail to Create!');
    }

    public function delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect('/admin/reservation')->with('success', 'Congrats Reservation Deleted Successfully');
    }

}
