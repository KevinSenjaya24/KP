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

@section('pageTitle', 'User Management')

@section('actionBar')
    
@endSection

@section('pageContent')
    @if (session('success'))
        <br><br>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <br><br>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @include('sweetalert::alert')

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table User</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jemaat</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Approval</th>
                                @if(auth()->user()->role=="superadmin")
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->jemaat_id}} - {{$user->jemaat->nama}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    
                                    <form method="POST" action="{{route('admin.user.update')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="hidden" name="jemaat_id" value="{{$user->jemaat_id}}">
                                        <input type="hidden" name="name" value="{{$user->name}}">
                                        <input type="hidden" name="email" value="{{$user->email}}">
                                        @if(auth()->user()->role=="superadmin")
                                        <select name="role" id="role">
                                            @if(!isset($$user->role))
                                            <option value="{{$user->role}}">Pilih Role</option>
                                            <option value="jemaat">Jemaat</option>
                                            <option value="superadmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="adminpost">Admin Post</option>
                                            <option value="adminibadah">Admin Ibadah</option>
                                            <option value="adminverification">Admin Verifikasi</option>
                                            @endif
                                        </select>
                                        @endif
                                        <input <?php if($user->active == 1){echo "checked";} ?> type="checkbox" name="active">
                                        <button type="submit" class="btn btn-success btn-approval">
                                            <i class="mdi mdi-check"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                @if(auth()->user()->role=="superadmin")
                                    <form method="POST" action="{{route('admin.user.delete', $user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                            <i class="mdi mdi-delete-circle"></i>
                                        </button>
                                    </form>
                                @endif
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
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection

@section('customScript')
    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
@endsection
