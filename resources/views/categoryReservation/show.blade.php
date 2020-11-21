@extends('layouts.app')

@section('content')
<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-8 info-post btn btn-primary">
            <div class="row">
                <div class="col-lg" style="font-family: gotham rounded; ">
                    <div div class="float-sm-center">
                        <h3 class="post">Data Ibadah</h3>
                        <p><b>1 Tesalonika 5:17-18</b></p>
                        <p><sup>5:17</sup> "Tetaplah berdoa.” <sup>5:18</sup> "Mengucap syukurlah dalam segala hal,
                         sebab itulah yang dikehendaki Allah di dalam Kristus Yesus bagi kamu.” </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container reserv">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="white-box">
                <h4 class="box-title m-b-0"><b>Table Pelayanan</b></h4>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table" border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pelayan ID</th>
                                <th>Category Reservation</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pelayanans as $pelayanan)
                            <tr>
                                <td>{{$pelayanan->id}}</td>
                                <td>{{$pelayanan->pelayan_id}} - {{$pelayanan->pelayan->jemaat->nama}} - {{$pelayanan->pelayan->CategoryPelayan->category_name}}</td>
                                <td>{{$pelayanan->category_reservation_id}} - {{$pelayanan->CategoryReservation->name}}</td>
                                <td>{{$pelayanan->CategoryReservation->tanggal}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container reserv">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="white-box">
                <h4 class="box-title m-b-0"><b>Table Lagu Ibadah</b></h4>
                <hr>
                <div class="table-responsive">
                    <table id="myTableLaguIbadah" class="table" border="1">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>No</th>
                                <th>Link Youtube</th>
                                <th>Category Reservation</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($laguIbadahs as $laguIbadah)
                            <tr>
                                <td>{{$laguIbadah->lagu->judul}}</td>
                                <td>{{$laguIbadah->lagu->category}}</td>
                                <td><a href="{{$laguIbadah->lagu->link_youtube}}">{{$laguIbadah->lagu->link_youtube}}</a></td>
                                <td>{{$laguIbadah->category_reservation_id}} - {{$laguIbadah->CategoryReservation->name}}</td>
                                <td>{{$laguIbadah->CategoryReservation->tanggal}}</td>
                                <td>
                                    <a href="{{ route('lagu.detail', $laguIbadah->lagu->id) }}" class="btn btn-primary btn-reservation">Show</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container reserv">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="white-box">
                <h4 class="box-title m-b-0"><b>Table Reservation</b></h4>
                <hr>
                <div class="table-responsive">
                    <table id="myTable1" class="table" border="1">
                        <thead>
                            <tr>
                                <th>ID Booking</th>
                                <th>Category Reservation</th>
                                <th>Tanggal</th>
                                <th>Jemaat</th>
                                <th>Jumlah Orang</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->id}}-{{$reservation->jemaat_id}}</td>
                                <td>{{$reservation->categoryReservation->name}}</td>
                                <td>{{$reservation->categoryReservation->tanggal}}</td>
                                <td>{{$reservation->jemaat->nama}}</td>
                                <td>{{$reservation->jumlah_orang}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection