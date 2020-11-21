<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CategoryReservation;
use App\Reservation;
use App\Jemaat;
use Illuminate\Support\Facades\Mail;

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
        return view('reservation.index',["reservations"=>$reservation]);
    }


    
    public function details(Request $request)
    {
        $data = Reservation::find($request->id);
        return view('reservation.detail',["category"=>$data]);
    }
    
    public function validateBooking(Request $request) 
    {
        $data = CategoryReservation::find($request->id);
        $reservations = Reservation::where('category_reservation_id', $request->id)->get();
        $total_rsvp = 0;
        foreach($reservations as $key => $reservation){
            $total_rsvp = $total_rsvp + $reservation->jumlah_orang;
        }
        $total_kursi = $request->kursi;
        $total_reservation = Reservation::where('category_reservation_id', $request->id)->count();
        $sisa_kursi = $total_kursi - $total_reservation;
        $sisa_kursi = $total_kursi - $total_rsvp;
        return $sisa_kursi;
    }

    public function show(Request $request)
    {
        $data = CategoryReservation::find($request->id);
        $categoryReservation = CategoryReservation::get();
        $jemaat = Jemaat::get();
        return view('reservation.detail',["reservation"=>$data, "categories"=>$categoryReservation, "Jemaat"=>$jemaat]);
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
        $data->nama =  $request->nama;
        $data->jumlah_orang =  $request->jumlah_orang;
        $data->note =  $request->note;
        $validateBooking = $this->validateBooking($request);

        if($request->sisa_kursi < $request->jumlah_orang){
        //     //record data to database
            $status = $data->save();
            if($status){
                return redirect('/categoryReservation')->with('success', 'Selamat kamu sudah terdaftar');
            }
        } elseif($sisa_kursi == 0){
            return redirect('home')->with('error', 'Opps! Reservation Fail to Create!');
        }
        
        // redirect with message
        
        
    }

    public function delete($id)
    {
        $categoryReservation = Reservation::find($id);
        $categoryReservation->delete();

        return redirect('categoryReservation')->with('success', 'Berhasil Hapus');
    }
    

}
