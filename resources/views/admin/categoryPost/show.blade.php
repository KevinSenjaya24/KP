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

@section('pageTitle', 'POST Management')

@section('actionBar')
    <a href="{{ route('admin.post.detail','add') }}" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light">Add</a>
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
                            <select class="form-control" id="categorySelector" name="category_post_id">
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

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table Post</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Excerpt</th>
                                <th>Tanggal</th>
                                <th>Aktif</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->category_post_id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>{{$post->tanggal}}</td>
                                <td>{{$post->active}}</td>
                                <td><img src="{{asset('storage/'.$post->photo)}}" height="50"/></td>
                                <td>
                                    <a href="{{ route('admin.post.detail',$post->id) }}" name="edit_id" value="{{$post->id}}">
                                        <button class="btn btn-primary">
                                            <i class="mdi mdi-border-color"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{route('admin.post.delete', $post->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('yakin menghapus da ?')">
                                            <i class="mdi mdi-delete-circle"></i>
                                        </button>
                                    </form>
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
