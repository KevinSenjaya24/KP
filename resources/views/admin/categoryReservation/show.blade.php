@extends('admin.layouts.wrapper')

@section('seoTag')
    <meta name="description" content="">
    <meta name="author" content="">
@endsection

@section('pluginLink')
    <!-- toast CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('admin-assets/css/animate.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle', 'Show Category Reservation')

@section('actionBar')
    
@endSection

@section('pageContent')

<div class="modal fade" id="tabelpelayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Januari</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pelayanan.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ (isset($pelayanan->id)?$pelayanan->id:"") }}"/>
                        <div class="form-group">
                            <label for="category">Pelayan ID</label>
                            <select class="form-control selectpicker" multiple data-live-search="true" name="pelayan_id[]">
                                @foreach($pelayans as $pelayan)
                                    @if(isset($pelayanan->pelayan_id))
                                        <option value="{{ $pelayan->id }}" {{ (($pelayanan->pelayan_id == $pelayan->id) ? "selected" : "") }}>{{$pelayan->jemaat_id}} - {{$pelayan->jemaat->nama}} - {{$pelayan->CategoryPelayan->category_name}}</option>
                                    @else
                                        <option value="{{ $pelayan->id }}">{{$pelayan->jemaat_id}} - {{$pelayan->jemaat->nama}} - {{$pelayan->CategoryPelayan->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryr">Category Reservation</label>
                            <select class="form-control" id="categorySelector" name="category_reservation_id">
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tabellaguibadah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Januari</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.laguIbadah.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ (isset($laguIbadah->id)?$laguIbadah->id:"") }}"/>
                        <div class="form-group">
                            <label for="category">Lagu ID</label>
                            <select class="form-control selectpicker" multiple data-live-search="true" name="lagu_id[]">
                                @foreach($lagus as $lagu)
                                    @if(isset($laguIbadah->lagu_id))
                                        <option value="{{ $lagu->id }}" {{ (($laguIbadah->lagu_id == $lagu->id) ? "selected" : "") }}>{{$lagu->id}} - {{$lagu->judul}}</option>
                                    @else
                                        <option value="{{ $lagu->id }}">{{$lagu->id}} - {{$lagu->judul}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryr">Category Reservation</label>
                            <select class="form-control" id="categorySelector" name="category_reservation_id">
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="tabelreservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Januari</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.reservation.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ (isset($reservation->id)?$reservation->id:"") }}"/>
                        <div class="form-group">
                            <label for="categoryr">Category Reservation</label>
                            <select class="form-control" id="categorySelector" name="category_reservation_id">
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="categoryr">Jemaat</label>
                            <select class="form-control selectpicker" data-live-search="true" name="jemaat_id">
                                <option disabled {{ (isset($reservation->jemaat_id)?"":"selected") }}>-- Select Category --</option>
                                @foreach($jemaats as $jemaat)
                                    @if(isset($reservation->jemaat_id))
                                        <option value="{{ $jemaat->id }}" {{ (($reservation->jemaatid == $jemaat->id) ? "selected" : "") }}>{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                                    @else
                                        <option value="{{ $jemaat->id }}">{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryr">Jumlah Orang</label>
                            <select class="form-control" id="categorySelector" name="jumlah_orang">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" name="note" class="form-control" id="note" value="{{ (isset($reservation->note) ? $reservation->note : "") }}" aria-describedby="jemaat" placeholder="Nama Pengikut">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<div class="col-sm-12">
    <div class="white-box">
        <div class="table-responsive">
        <div class="row">
            <div class="col-md-11">
                <h3 class="box-title m-b-0 black">Table Pelayanan</h3>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline btn-info m-b-0 waves-effect waves-light" data-toggle="modal" data-target="#tabelpelayanan">
                    Add
                </button>
            </div>
        </div>
        <hr>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Pelayan ID</th>
                        <th>Category Reservation</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pelayanans as $pelayanan)
                    <tr>
                    <form method="POST" action="{{route('admin.pelayanan.update')}}">
                        @csrf
                        <td>
                        <input type="hidden" name="id" value="{{$pelayanan->id}}">
                        <select class="form-control" name="pelayan_id">
                            <option disabled {{ (isset($pelayanan->pelayan_id)?"":"selected") }}>-- Select Pelayan --</option>
                            @foreach($pelayans as $pelayan)
                                @if(isset($pelayanan->pelayan_id))
                                    <option value="{{ $pelayan->id }}" {{ (($pelayanan->pelayan_id == $pelayan->id) ? "selected" : "") }}>{{$pelayan->jemaat->nama}} - {{$pelayan->CategoryPelayan->category_name}}</option>
                                @else
                                    <option value="{{ $pelayan->id }}">{{$pelayan->jemaat->nama}} - {{$pelayan->CategoryPelayan->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        <input type="hidden" name="category_reservation_id" class="form-control" id="name" value="{{$categories->id}}">
                        </td>
                        <td>{{$pelayanan->CategoryReservation->name}}</td>
                        <td>{{$pelayanan->CategoryReservation->tanggal}}</td>
                        <td>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success btn-approval">
                                    <i class="mdi mdi-check"></i>
                                </button>
                            </div>
                        </form>
                            <div class="col-md-1">
                                <form method="POST" action="{{route('admin.pelayanan.delete', $pelayanan->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                        <i class="mdi mdi-delete-circle"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        </td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="white-box">
        <div class="row">
            <div class="col-md-11">
                <h3 class="box-title m-b-0 black">Table Lagu Ibadah</h3>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline btn-info m-b-0 waves-effect waves-light" data-toggle="modal" data-target="#tabellaguibadah">
                    Add
                </button>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="myTableLaguIbadah" class="table table-striped">
                <thead>
                    <tr>
                        <th>Lagu ID</th>
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
                    <form method="POST" action="{{route('admin.laguIbadah.update')}}">
                        @csrf
                        <td>
                        <input type="hidden" name="id" value="{{ $laguIbadah->id }}"/>
                        <!-- <input type="text" name="lagu_id" value="{{ $laguIbadah->lagu->id }}"/> -->
                        <select class="form-control" name="lagu_id">
                            @foreach($lagus as $lagu)
                                    <option value="{{ $lagu->id }}" {{ (($laguIbadah->lagu_id == $lagu->id) ? "selected" : "") }}>{{$lagu->id}} - {{$lagu->judul}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="category_reservation_id" class="form-control" id="name" value="{{$categories->id}}">
                        </td>
                        <td>{{$laguIbadah->lagu->category}}</td>
                        <td><a href="{{$laguIbadah->lagu->link_youtube}}">{{$laguIbadah->lagu->link_youtube}}</a></td>
                        <td>{{$laguIbadah->category_reservation_id}} - {{$laguIbadah->CategoryReservation->name}}</td>
                        <td>{{$laguIbadah->CategoryReservation->tanggal}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-approval">
                                        <i class="mdi mdi-check"></i>
                                    </button>
                                </div>
                        </form>
                                <div class="col-md-1">
                                    <form method="POST" action="{{route('admin.laguIbadah.delete', $laguIbadah->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                            <i class="mdi mdi-delete-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="white-box">
        <div class="row">
            <div class="col-md-11">
                <h3 class="box-title m-b-0 black">Table Reservation</h3>
            </div>
            <!-- <div class="col-md-1">
                <button type="button" class="btn btn-outline btn-info m-b-0 waves-effect waves-light" data-toggle="modal" data-target="#tabelreservation">
                    Add
                </button>
            </div> -->
        </div>
        <hr>
        <div class="table-responsive">
            <table id="myTable1" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Category Reservation</th>
                        <th>Tanggal</th>
                        <th>Jemaat</th>
                        <th>Jumlah Orang</th>
                        <th>Note</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->id}}-{{$reservation->jemaat_id}}</td>
                        <td>{{$reservation->category_reservation_id}} - {{$reservation->categoryReservation->name}}</td>
                        <td>{{$reservation->categoryReservation->tanggal}}</td>
                        <td>{{$reservation->jemaat->nama}}</td>
                        <td>{{$reservation->jumlah_orang}}</td>
                        <td>{{$reservation->note}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('admin.reservation.detail',$reservation->id) }}" name="edit_id" value="{{$reservation->id}}">
                                        <button class="btn btn-primary">
                                            <i class="mdi mdi-border-color"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-1">
                                    <form method="POST" action="{{route('admin.reservation.delete', $reservation->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                            <i class="mdi mdi-delete-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('pluginScript')
     <!--Wave Effects -->
     <script src="{{ asset('admin-assets/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('admin-assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('admin-assets/plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/morrisjs/morris.js') }}"></script>
    <!-- chartist chart -->
    <script src="{{ asset('admin-assets/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Calendar JavaScript -->
    <script src="{{ asset('admin-assets/plugins/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/calendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/calendar/dist/cal-init.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="summernote/summernote.min.js"></script>

@endsection
