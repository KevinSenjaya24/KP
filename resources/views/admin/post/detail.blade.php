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

@section('pageTitle', 'POST DETAILS MANAGEMENT')

@section('actionBar')
@endSection

@section('crumbList')
    <li class="active">Post</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                <form action="{{ route('admin.post.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ (isset($post->id)?$post->id:"") }}"/>
                        <div class="form-body">
                            <h3 class="box-title black">Form Post Details</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="category">Category</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="category_post_id">
                                            <option disabled {{ (isset($post->category_post_id)?"":"selected") }}>-- Select Category --</option>
                                            @foreach($categories as $category)
                                                @if(isset($post->category_post_id))
                                                    <option value="{{ $category->id }}" {{ (($post->category_post_id == $category->id) ? "selected" : "") }}>{{ $category->id }} - {{$category->category_name}}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->id }} - {{$category->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ (isset($post->title) ? $post->title : "") }}" aria-describedby="post" placeholder="Enter Title">     
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="excerpt">Excerpt</label>
                                        <input type="text" name="excerpt" class="form-control" id="title" value="{{ (isset($post->excerpt) ? $post->excerpt : "") }}" aria-describedby="post" placeholder="Enter Excerpt">
                                    </div>
                                </div>
                                    <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggal" value="{{ (isset($post->tanggal) ? $post->tanggal : "") }}" id="example-date-input">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Aktif</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Photo</label>
                                        <input type="file" name="photo" class="form-control" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label class="control-label" for="content">Content</label>
                                        <textarea name="content" value="{{ (isset($post->content) ? $post->content : "") }}">{{ (isset($post->content) ? $post->content : "") }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="summernote/summernote.min.js"></script>

@endsection


