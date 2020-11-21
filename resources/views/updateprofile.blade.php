@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>
                @if (session('success'))
                    <div class="col-md-12 alert alert-success justify-content-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <br><br>
                    <div class="col-md-12 alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('jemaat.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input  name="id" type="hidden" value="{{Auth::user()->jemaat->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ Auth::user()->jemaat->nama }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_keanggotaan" class="col-md-4 col-form-label text-md-right">{{ __('Status Keanggotaan') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('status_keanggotaan') is-invalid @enderror" name="status_keanggotaan" value="{{ Auth::user()->jemaat->status_keanggotaan }}" required autocomplete="name" autofocus readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="family_id" class="col-md-4 col-form-label text-md-right">{{ __('Family ID') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('family_id') is-invalid @enderror" name="family_id" value="{{ Auth::user()->jemaat->family_id }}" required autocomplete="name" autofocus readonly>

                                @error('family_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ Auth::user()->jemaat->tempat_lahir}}" required autocomplete="tempat_lahir">

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ Auth::user()->jemaat->tanggal_lahir}}" required autocomplete="tanggal_lahir">

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jenis_kelamin">
                                    @if(isset(Auth::user()->jemaat->jenis_kelamin))
                                    <option value="{{Auth::user()->jemaat->jenis_kelamin}}">{{Auth::user()->jemaat->jenis_kelamin}}</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    @else
                                    <option>Pilih Jenis Kelamin</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    
                                    @endif
                                </select> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ Auth::user()->jemaat->alamat}}">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('No Telp') }}</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{ Auth::user()->jemaat->no_telp}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="pekerjaan" id="myselect">
                                    @if(isset(Auth::user()->jemaat->pekerjaan))
                                    <option value="{{Auth::user()->jemaat->pekerjaan}}">{{Auth::user()->jemaat->pekerjaan}}</option>
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Guru / Dosen">Guru / Dosen</option>
                                    <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                    <option value="Belum / Tidak Bekerja">Belum / Tidak Bekerja</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    @else
                                    <option>Pilih Pekerjaan</option>
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Guru / Dosen">Guru / Dosen</option>
                                    <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                    <option value="Belum / Tidak Bekerja">Belum / Tidak Bekerja</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    
                                    @endif
                                </select> 
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="hobi" class="col-md-4 col-form-label text-md-right">{{ __('Hobi') }}</label>

                            <div class="col-md-6">
                                <input id="nhobi" type="text" class="form-control" name="hobi" value="{{ Auth::user()->jemaat->hobi}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hobi" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                            <input type="file" name="photo" class="form-control" accept="image/png, image/jpeg">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hobi" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <img style="width:100px;" class="imgjemaat" src="{{asset('storage/'.Auth::user()->jemaat->photo )}}" height="25"/>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
