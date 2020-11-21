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

@section('pageTitle', 'Jemaat Management')

@section('actionBar')
    <button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
	</button>
    <a href="{{ route('admin.jemaat.export_excel') }}" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" target="_blank">EXPORT EXCEL</a>
    <a href="{{ route('admin.jemaat.detail','add') }}" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light">Add</a>
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
    {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
        @endif

        @include('sweetalert::alert')
        
<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="januari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Januari</h5>
                </div>
                <div class="modal-body">

                <table id="myTable" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($januari as $january)
                    <tr>
                        <td>{{$january->nama}}</td>
                        
                        <td>{{$january->tanggal_lahir}}</td>
                        <td>{{$january->status_keanggotaan}}</td>
                        <td>{{$january->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="februari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Februari</h5>
                </div>
                <div class="modal-body">

                <table id="myTableFebruari" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($februari as $february)
                    <tr>
                        <td>{{$february->nama}}</td>
                        <td>{{$february->tanggal_lahir}}</td>
                        <td>{{$february->status_keanggotaan}}</td>
                        <td>{{$february->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="maret" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maret</h5>
                </div>
                <div class="modal-body">

                <table id="myTableMaret" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($maret as $march)
                    <tr>
                        <td>{{$march->nama}}</td>
                        <td>{{$march->tanggal_lahir}}</td>
                        <td>{{$march->status_keanggotaan}}</td>
                        <td>{{$march->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="april" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">April</h5>
                </div>
                <div class="modal-body">

                <table id="myTableApril" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($april as $aprils)
                    <tr>
                        <td>{{$aprils->nama}}</td>
                        <td>{{$aprils->tanggal_lahir}}</td>
                        <td>{{$aprils->status_keanggotaan}}</td>
                        <td>{{$aprils->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="mei" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mei</h5>
                </div>
                <div class="modal-body">

                <table id="myTableMei" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mei as $may)
                    <tr>
                        <td>{{$may->nama}}</td>
                        <td>{{$may->tanggal_lahir}}</td>
                        <td>{{$may->status_keanggotaan}}</td>
                        <td>{{$may->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="juni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Juni</h5>
                </div>
                <div class="modal-body">

                <table id="myTableJuni" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($juni as $juny)
                    <tr>
                        <td>{{$juny->nama}}</td>
                        <td>{{$juny->tanggal_lahir}}</td>
                        <td>{{$juny->status_keanggotaan}}</td>
                        <td>{{$juny->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="juli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Juli</h5>
                </div>
                <div class="modal-body">

                <table id="myTableJuli" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($juli as $july)
                    <tr>
                        <td>{{$july->nama}}</td>
                        <td>{{$july->tanggal_lahir}}</td>
                        <td>{{$july->status_keanggotaan}}</td>
                        <td>{{$july->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="agustus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agustus</h5>
                </div>
                <div class="modal-body">

                <table id="myTableAgustus" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($agustus as $august)
                    <tr>
                        <td>{{$august->nama}}</td>
                        <td>{{$august->tanggal_lahir}}</td>
                        <td>{{$august->status_keanggotaan}}</td>
                        <td>{{$august->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="september" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">September</h5>
                </div>
                <div class="modal-body">

                <table id="myTableSeptember" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($september as $sept)
                    <tr>
                        <td>{{$sept->nama}}</td>
                        <td>{{$sept->tanggal_lahir}}</td>
                        <td>{{$sept->status_keanggotaan}}</td>
                        <td>{{$sept->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="oktober" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Oktober</h5>
                </div>
                <div class="modal-body">

                <table id="myTableOktober" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($oktober as $october)
                    <tr>
                        <td>{{$october->nama}}</td>
                        <td>{{$october->tanggal_lahir}}</td>
                        <td>{{$october->status_keanggotaan}}</td>
                        <td>{{$october->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="november" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">November</h5>
                </div>
                <div class="modal-body">

                <table id="myTableNovember" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($november as $nov)
                    <tr>
                        <td>{{$nov->nama}}</td>
                        <td>{{$nov->tanggal_lahir}}</td>
                        <td>{{$nov->status_keanggotaan}}</td>
                        <td>{{$nov->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="desember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="/admin/jemaat/import_excel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desember</h5>
                </div>
                <div class="modal-body">

                <table id="myTableDesember" class="table table-striped" border="2">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Status Keanggotaan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($desember as $december)
                    <tr>
                        <td>{{$december->nama}}</td>
                        <td>{{$december->tanggal_lahir}}</td>
                        <td>{{$december->status_keanggotaan}}</td>
                        <td>{{$december->pekerjaan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table Jemaat</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTableJemaat" class="table table-striped" >
                        <thead>
                            <tr>    
                            <th>ID</th>
                            <th>Kepala Keluarga</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <!-- <th>Jenis Kelamin</th> -->
                            <th>Alamat</th>
                            <!-- <th>No telp</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Hobi</th> -->
                            <th>Umur</th>
                            <th>Divisi</th>
                            <!-- <th>Photo</th> -->
                            <th>Status Keanggotaan</th>
                            <th>Baptis</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jemaats as $jemaat)
                            <tr>
                                <td>{{$jemaat->id}}</td>
                                <td>{{$jemaat->family->kepala_keluarga}}</td>
                                <td>{{$jemaat->nama}}</td>
                                <td>{{$jemaat->tempat_lahir}}, {{$jemaat->tanggal_lahir}}</td>
                                <!-- <td>{{$jemaat->jenis_kelamin}}</td> -->
                                <td>{{$jemaat->alamat}}</td>
                                <!-- <td>{{$jemaat->no_telp}}</td>
                                <td>{{$jemaat->status}}</td>
                                <td>{{$jemaat->pekerjaan}}</td>
                                <td>{{$jemaat->hobi}}</td> -->
                                <td>
                                    <?php
                                        $dob = $jemaat->tanggal_lahir;
                                        $diff = date('Y') - date('Y', strtotime($dob));
                                        echo $diff;
                                    ?>
                                </td>
                                <td>
                                    @if($diff >= 0 && $diff <=5)
                                        Batita & Balita
                                    @elseif($diff >= 6 && $diff <=12)
                                        Sekolah Minggu
                                    @elseif($diff >= 13 && $diff <=15)
                                        Tunas Remaja
                                    @elseif($diff >=16 && $diff <=18)
                                        Remaja
                                    @elseif($diff >=19 && $diff <=30)
                                        Pemuda
                                    @elseif($diff >=30)
                                        Perkarya atau Perkawan
                                    @endif
                                </td>
                                <!-- <td><img src="{{asset('storage/'.$jemaat->photo)}}" height="50"/></td> -->
                                <td>{{$jemaat->status_keanggotaan}}</td>
                                <td>{{$jemaat->baptis}}</td>
                                
                                <td>
                                    
                                    <a href="{{ route('admin.jemaat.detail',$jemaat->id) }}" name="edit_id" value="{{$jemaat->id}}">
                                        <button class="btn btn-primary">
                                            <i class="mdi mdi-border-color"></i>
                                        </button>
                                    </a>
                                    @if( Auth::user()->role == "superadmin" )
                                    <form method="POST" action="{{route('admin.jemaat.delete', $jemaat->id)}}">
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

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table Jemaat Yang Ulang Tahun Hari Ini</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTableUltah" class="table table-striped" >
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Kepala Keluarga</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <!-- <th>Jenis Kelamin</th> -->
                            <th>Alamat</th>
                            <!-- <th>No telp</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Hobi</th> -->
                            <th>Umur</th>
                            <th>Divisi</th>
                            <!-- <th>Photo</th> -->
                            <th>Status Keanggotaan</th>
                            <th>Baptis</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ultah as $jemaat)
                            <tr>
                                <td>{{$jemaat->id}}</td>
                                <td>{{$jemaat->family->kepala_keluarga}}</td>
                                <!-- @if($jemaat->status_keanggotaan == '1')
                                <td>Aktif</td>
                                @elseif($jemaat->status_keanggotaan == '2')
                                <td>Tidak Aktif</td>
                                @endif -->
                                <td>{{$jemaat->nama}}</td>
                                <td>{{$jemaat->tempat_lahir}}, {{$jemaat->tanggal_lahir}}</td>
                                <!-- <td>{{$jemaat->jenis_kelamin}}</td> -->
                                <td>{{$jemaat->alamat}}</td>
                                <!-- <td>{{$jemaat->no_telp}}</td>
                                <td>{{$jemaat->status}}</td>
                                <td>{{$jemaat->pekerjaan}}</td>
                                <td>{{$jemaat->hobi}}</td> -->
                                <td>
                                    <?php
                                        $dob = $jemaat->tanggal_lahir;
                                        $diff = date('Y') - date('Y', strtotime($dob));
                                        echo $diff;
                                    ?>
                                </td>
                                <td>
                                    @if($diff >= 0 && $diff <=5)
                                        Batita & Balita
                                    @elseif($diff >= 6 && $diff <=12)
                                        Sekolah Minggu
                                    @elseif($diff >= 13 && $diff <=15)
                                        Tunas Remaja
                                    @elseif($diff >=16 && $diff <=18)
                                        Remaja
                                    @elseif($diff >=19 && $diff <=30)
                                        Pemuda
                                    @endif
                                </td>
                                <!-- <td><img src="{{asset('storage/'.$jemaat->photo)}}" height="50"/></td> -->
                                <td>{{$jemaat->status_keanggotaan}}</td>
                                <td>{{$jemaat->baptis}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table Ulang Tahun Jemaat</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped" border="2">
                    <thead>
                        <tr>
                            <th>Januari</th>
                            <th>Februari</th>
                            <th>Maret</th>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Juni</th>
                            <th>July</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Oktober</th>
                            <th>November</th>
                            <th>Desember</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#januari">
                                Show
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#februari">
                                Show    
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#maret">
                                Show    
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#april">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#mei">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#juni">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#juli">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#agustus">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#september">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#oktober">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#november">
                                Show 
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline btn-info pull-center m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#desember">
                                Show 
                            </button>
                        </td>
                    </tr>
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
