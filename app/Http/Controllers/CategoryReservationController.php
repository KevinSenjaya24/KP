<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryReservation;
use App\Reservation;
use App\Pelayanan;
use App\LaguIbadah;

class CategoryReservationController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $categoryReservation = Reservation::where('category_reservation_id', $request->id)->get();
        $data = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->get();
        return view('categoryReservation.index',["categories"=>$data, "categoryReservation"=>$categoryReservation]);
    }
    
    public function reservation(Request $request)
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
        $categoryReservation = Reservation::where('category_reservation_id', $request->id)->get();
        $data1 = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->paginate(4);
        return view('layouts.welcome',["categories"=>$data1, "categoryReservation"=>$categoryReservation, "sisaKursi"=>$sisa_kursi]);
    }

    public function reservationhome(Request $request)
    {
        $data1 = CategoryReservation::where('active', '1')->orderBy('id', 'desc')->paginate(4);
        return view('home',["categories"=>$data1]);
    }
    

    public function details(Request $request)
    {
        $data = CategoryReservation::find($request->id);
        $reservations = Reservation::get();
        $total_rsvp = 0;
        foreach($reservations as $key => $reservation){
            $total_rsvp = $total_rsvp + $reservation->jumlah_orang;
        }
        $total_kursi = $data->kursi;
        $sisa_kursi = $total_kursi - $total_rsvp;
        $categoryReservation = Reservation::where('category_reservation_id', $request->id)->orderBy('id', 'desc')->get();
        return view('categoryReservation.detail',["category"=>$data, "categoryReservation"=>$categoryReservation, "sisaKursi"=>$sisa_kursi]);
    }

    public function show(Request $request)
    {
        $data = CategoryReservation::find($request->id);
        $reservation = Reservation::where('category_reservation_id', $request->id)->get();
        $pelayanan = Pelayanan::where('category_reservation_id', $request->id)->get();
        $laguIbadah = laguIbadah::where('category_reservation_id', $request->id)->get();
        return view('categoryReservation.show',["categories"=>$data, "reservations"=>$reservation, "pelayanans"=>$pelayanan, "laguIbadahs"=>$laguIbadah]);
    }

    public function update(Request $request)
    {
        //select book
        if($request->id){
            $data = CategoryReservation::find($request->id);
        }else{
            $data = new CategoryReservation;
        }

        if($request->photo){
            $path = $request->file('photo')->store('CategoryReservation');
            $data->photo = $path;
        }

        // update data variable
        $data->name = $request->name;
        $data->tanggal = $request->tanggal;
        $data->kursi = $request->kursi;
        $data->active = $request->active;
      


        //record data to database
        $status = $data->save();

        //redirect with message
        if($status){
            return redirect('/admin/categoryReservation')->with('success', 'Congrats Category Reservation Saved Successfully!');
        }
        return redirect('/admin/categoryReservation')->with('error', 'Opps! Category Reservation Fail to Create!');
    }

    public function delete($id)
    {
        $categoryReservation = CategoryReservation::find($id);
        $categoryReservation->delete();

        return redirect('/admin/categoryReservation')->with('success', 'Congrats Product Deleted Successfully');
    }

   
}
