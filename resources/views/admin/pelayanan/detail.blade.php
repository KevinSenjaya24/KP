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

@section('pageTitle', 'PELAYANAN DETAILS MANAGEMENT')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">Pelayanan</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')
<div class="col-sm-8">
    <div class="white-box">
        <h3 class="box-title m-b-0 black">FORM PELAYANAN DETAILS</h3>
        <hr>
        <form action="{{ route('admin.pelayanan.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ (isset($pelayanan->id)?$pelayanan->id:"") }}"/>
            <div class="form-group">
                <label for="category">Pelayan ID</label>
                <select class="form-control" id="categorySelector" name="pelayan_id">
                    <option disabled {{ (isset($pelayanan->pelayan_id)?"":"selected") }}>-- Select Category --</option>
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
                    <option disabled {{ (isset($pelayanan->category_reservation_id)?"":"selected") }}>-- Select Category --</option>
                    @foreach($categories as $category)
                        @if(isset($pelayanan->category_reservation_id))
                            <option value="{{ $category->id }}" {{ (($pelayanan->category_reservation_id == $category->id) ? "selected" : "") }}>{{ $category->id }} - {{$category->name}}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->id }} - {{$category->name}}</option>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="summernote/summernote.min.js"></script>

@endsection

@section('customScript')
    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
{{--    <script>--}}
{{--        $('select').selectpicker();--}}
{{--    </script>--}}

@endsection

