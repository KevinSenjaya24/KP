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

@section('pageTitle', 'BPJ DETAILS MANAGEMENT')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">BPJ</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')
<div class="col-sm-8">
    <div class="white-box">
        <h3 class="box-title m-b-0 black">FORM BPJ DETAILS</h3>
        <hr>
        <form action="{{ route('admin.bpj.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ (isset($bpj->id)?$bpj->id:"") }}"/>
            <div class="form-group">
                <label for="category">Jemaat ID</label>
                <select class="form-control selectpicker" data-live-search="true" name="jemaat_id">
                    <option disabled {{ (isset($bpj->jemaat_id)?"":"selected") }}>Pilih ID Jemaat</option>
                    @foreach($jemaats as $jemaat)
                        @if(isset($bpj->jemaat_id))
                            <option data-tokens="{{ $jemaat->id }} - {{$jemaat->nama}}" value="{{ $jemaat->id }}" {{ (($bpj->jemaat_id == $jemaat->id) ? "selected" : "") }}>{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                        @else
                            <option data-tokens="{{ $jemaat->id }} - {{$jemaat->nama}}" value="{{ $jemaat->id }}">{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="divisi">Divisi</label>
                <input type="text" name="divisi" class="form-control" id="divisi" value="{{ (isset($bpj->divisi) ? $bpj->divisi : "") }}" aria-describedby="bpj" placeholder="Enter Divisi">
            </div>
            <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" name="periode" class="form-control" id="periode" value="{{ (isset($bpj->periode) ? $bpj->periode : "") }}" aria-describedby="bpj" placeholder="Enter Periode">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
            </div>
        </form>
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


