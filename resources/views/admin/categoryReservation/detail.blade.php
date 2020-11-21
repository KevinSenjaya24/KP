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

@section('pageTitle', 'CATEGORY RESERVATION DETAILS')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">Category Reservation</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')
<div class="col-sm-8">
    <div class="white-box">
        <h3 class="box-title m-b-0 black">FORM CATEGORY RESERVATION DETAILS</h3>
        <hr>
        <form action="{{ route('admin.categoryReservation.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  name="id" value="{{ (isset($category->id)?$category->id:"") }}"/>
            
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ (isset($category->name) ? $category->name : "") }}" aria-describedby="category" placeholder="Enter Category Name">
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="tanggal" value="{{ (isset($category->tanggal) ? $category->tanggal : "") }}" id="example-date-input">
                </div>
            </div>

            <div class="form-group">
                <label for="kursi">Kursi</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="kursi" value="{{ (isset($category->kursi) ? $category->kursi : "") }}" >
                </div>
            </div>

            <div class="form-group">
                <label for="active">Active</label>
                <select class="form-control" name="active" id="active">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/png, image/jpeg">
            </div>
            <div class="col-md-6">
                <img class="imgjemaat" src="{{asset('storage/'.(isset($category->photo) ? $category->photo : "") )}}" height="25"/>
            </div> <br>
            <hr>
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

