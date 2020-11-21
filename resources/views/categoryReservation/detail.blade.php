@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
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
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('reservation.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="category_reservation_id" class="form-control" id="category_reservation_id" value="{{$category->id}}" aria-describedby="jemaat" placeholder="{{$category->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Category Reservation</label>
                        <input type="text" class="form-control" id="category_reservation_id" aria-describedby="jemaat" placeholder="{{$category->name}} - {{$category->tanggal}}" readonly>
                    </div>
                    <div class="form-group  m-t-20 @error('jemaat_id') has-error @enderror" >
                        <input type="hidden" name="jemaat_id" class="form-control" id="nama" value="{{ Auth::user()->jemaat->id }}" aria-describedby="jemaat" placeholder="Enter" readonly>
                        @error('jemaat_id')
                        <span class="help-block"" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->jemaat->nama }}" aria-describedby="jemaat" placeholder="Enter Name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Kursi Sisa</label>
                        <input type="text" name="" class="form-control" id="" value="{{$sisaKursi}}" aria-describedby="jemaat" placeholder="Enter Name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status_keanggotaan">Jumlah Orang</label>
                        <select class="form-control" name="jumlah_orang" id="jumlah_orang">
                            @if($sisaKursi == 0)
                            <option>Tidak tersedia</option>
                            @elseif($sisaKursi == 1)
                            <option value="1">1</option>
                            @elseif($sisaKursi == 2)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            @elseif($sisaKursi == 3)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            @elseif($sisaKursi == 4)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            @elseif($sisaKursi == 5)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            @elseif($sisaKursi == 6)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            @elseif($sisaKursi == 7)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            @elseif($sisaKursi == 8)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            @elseif($sisaKursi == 9)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            @elseif($sisaKursi == 10)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            @elseif($sisaKursi >= 10)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" name="note" class="form-control" id="note" value="{{ (isset($reservation->note) ? $reservation->note : "") }}" aria-describedby="jemaat" placeholder="Nama Pengikut">
                    </div>
                    @if($sisaKursi >= 1)
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    @elseif($sisaKursi == 0)
                        <div class="alert alert-danger">
                           Maaf Kursi sudah penuh silahkan ke sesi berikutnya atau hubungi admin yang bersangkutan
                        </div>
                    @endif
                </form>
                <br>
                <div class="col-sm-12">
                <div class="white-box">
                        <div class="table-responsive">
                                <table class="display" id="myTable" >
                                <thead>
                                <tr>
                                    <th>ID Booking</th>
                                    <th>Category Reservation</th>
                                    <th>Tanggal</th>
                                    <!-- <th>Jemaat ID</th> -->
                                    <!-- <th>Nama</th> -->
                                    <th>Jumlah Orang</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($categoryReservation as $reservation)
                                    @if(Auth::user()->jemaat->id === $reservation->jemaat_id)
                                        <tr>
                                            <td>{{$reservation->id}}-{{$reservation->jemaat_id}}</td>
                                            <td>{{$reservation->categoryReservation->name}}</td>
                                            <td>{{$reservation->categoryReservation->tanggal}}</td>                        
                                            <!-- <td>{{$reservation->jemaat_id}}</td>
                                            <td>{{$reservation->nama}}</td> -->
                                            <td>{{$reservation->jumlah_orang}}</td>
                                            <td>
                                                <form method="POST" action="{{route('reservation.delete', $reservation->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i>Delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @else
                                    @endif
                                @endforeach
                                
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
