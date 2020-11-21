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

@section('pageTitle', 'USER DETAILS MANAGEMENT')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">Pelayan</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')
    <div class="row">
        <div class="col-sm-8">
            <div class="white-box">
                <h3 class="box-title m-b-0">FORM USER DETAILS</h3>
                <form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ (isset($user->id)?$user->id:"") }}"/>
                    <div class="form-group">
                        <label for="category">Jemaat ID</label>
                        <select class="form-control selectpicker" data-live-search="true" name="jemaat_id">
                            <option disabled {{ (isset($pelayan->jemaat_id)?"":"selected") }}>-- Select Category --</option>
                            @foreach($jemaats as $jemaat)
                                @if(isset($user->jemaat_id))
                                    <option value="{{ $jemaat->id }}" {{ (($user->jemaat_id == $jemaat->id) ? "selected" : "") }}>{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                                @else
                                    <option value="{{ $jemaat->id }}">{{ $jemaat->id }} - {{$jemaat->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ (isset($user->name) ? $user->name : "") }}" aria-describedby="user" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ (isset($user->email) ? $user->email : "") }}" aria-describedby="user" placeholder="Masukan Email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="superadmin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="adminpost">Admin Post</option>
                            <option value="adminibadah">Admin Ibadah</option>
                            <option value="adminverification">Admin Verifikasi</option>
                            <option value="jemaat">Jemaat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
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


