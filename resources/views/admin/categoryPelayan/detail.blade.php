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

@section('pageTitle', 'Category Pelayan Details')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">Category Pelayan</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')
<div class="col-sm-8">
    <div class="white-box">
        <h3 class="box-title m-b-0 black">FORM CATEGORY PELAYAN</h3>
        <hr>
        <form action="{{ route('admin.categoryPelayan.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  name="id" value="{{ (isset($pelayan->id)?$pelayan->id:"") }}"/>
            
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name" value="{{ (isset($pelayan->category_name) ? $pelayan->category_name : "") }}" aria-describedby="pelayan" placeholder="Masukan Nama Kategori">
            </div>
            <div class="form-group">
                <label>Ibadah</label>
                <select class="form-control" name="ibadah" id="ibadah">
                    <option value="Umum">Ibadah Umum</option>
                    <option value="Pemuda">Ibadah Pemuda</option>
                    <option value="Remaja">Ibadah Remaja</option>
                    <option value="Perkauan">Ibadah Perkauan</option>
                    <option value="Perkarya">Ibadah Perkarya</option>
                    <option value="Sekolah Minggu">Ibadah Sekolah Minggu</option>
                    <option value="Gabungan">Ibadah Gabungan</option>
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

