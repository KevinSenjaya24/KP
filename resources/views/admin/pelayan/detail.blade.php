@extends('admin.layouts.wrapper')

@section('seoTag')
    <meta name="description" content="">
    <meta name="author" content="">
@endsection

@section('pluginLink')

@endsection

@section('pageTitle', 'PELAYAN DETAILS MANAGEMENT')

@section('actionBar')
@endSection

@section('crumbList')
    <li>Pelayan</li>
    <li >Details</li>
@endsection

@section('pageContent')
<div class="col-sm-8">
    <div class="white-box">
        <h3 class="box-title m-b-0 black">FORM PELAYAN</h3>
        <hr>
        <form action="{{ route('admin.pelayan.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ (isset($pelayan->id)?$pelayan->id:"") }}"/>
            <div class="form-group">
                <label for="category">Jemaat ID</label>
                <select class="form-control selectpicker" multiple data-live-search="true" name="jemaat_id[]">
                    @foreach($jemaats as $jemaat)
                        @if(isset($pelayan->jemaat_id))
                            <option value="{{ $jemaat->id }}" {{ (($pelayan->jemaat_id == $jemaat->id) ? "selected" : "") }}>{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                        @else
                            <option value="{{ $jemaat->id }}">{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category Pelayan</label>
                <select class="form-control selectpicker" data-live-search="true" name="category_pelayan_id">
                    <option disabled {{ (isset($pelayan->category_pelayan_id)?"":"selected") }}>-- Select Category --</option>
                    @foreach($categories as $category)
                        @if(isset($pelayan->category_pelayan_id))
                            <option value="{{ $category->id }}" {{ (($pelayan->category_pelayan_id == $category->id) ? "selected" : "") }}>{{ $category->id }} - {{$category->category_name}}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->id }} - {{$category->category_name}}</option>
                        @endif
                    @endforeach
                </select>
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


