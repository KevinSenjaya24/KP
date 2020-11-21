<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryReservation;
use App\Reservation;
use App\Pelayanan;
use App\Pelayan;
use App\Lagu;
use App\LaguIbadah;
use PDF;

class CategoryReservationController extends Controller
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
        $data = CategoryReservation::get();
        return view('admin.categoryReservation.index',["categories"=>$data]);
    }

    public function show(Request $request)
    {
        $data = CategoryReservation::find($request->id);
        $reservation = Reservation::where('category_reservation_id', $request->id)->get();
        $pelayanan = Pelayanan::where('category_reservation_id', $request->id)->get();
        $pelayan = Pelayan::get();
        $lagu = Lagu::get();
        $laguIbadah = LaguIbadah::get();
        $laguIbadah = laguIbadah::where('category_reservation_id', $request->id)->get();
        return view('admin.categoryReservation.show',["categories"=>$data, "reservations"=>$reservation, "lagus"=>$lagu, "laguIbadah"=>$laguIbadah, "pelayans"=>$pelayan, "pelayanans"=>$pelayanan, "laguIbadahs"=>$laguIbadah]);
    }

    public function details(Request $request)
    {
        $data = CategoryReservation::find($request->id);
        return view('admin.categoryReservation.detail',["category"=>$data]);
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

    public function generatePDF()

    {
        $data = ['title' => 'Reservation Ibadah'];

        $pdf = PDF::loadView('admin.categoryReservation.reservationPDF', $data);
        return $pdf->download('laporan-pdf.pdf');
    }

    public function approval(Request $request) {
        if($request->id){
            $data = CategoryReservation::find($request->id);
        }else{
            $data = new CategoryReservation;
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
            return redirect('/admin/categoryReservation')->with('success', 'Congrats User Saved Successfully!');
        }
        return redirect('/admin/categoryReservation')->with('error', 'Opps! User Fail to Create!');
    }

}
