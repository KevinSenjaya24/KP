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
                   
                   
                    
                    <table class="display" id="myTable" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Reservation</th>
                    <th>Jemaat ID</th>
                    <th>Value</th>
                    <th>Photo</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->category_reservation_id}}</td>
                        <td>{{$reservation->jemaat_id}} - {{$reservation->jemaat->nama}}</td>
                        <td>{{$reservation->value}}</td>
                        <td><img src="{{asset('storage/'.$reservation->photos)}}" height="50"/></td>
                        <td>
                            <a href="{{ route('admin.reservation.detail',$reservation->id) }}" class="btn btn-primary editCta" name="edit_id" value="{{$reservation->id}}"><i>Edit</i></a>
                            <form method="POST" action="{{route('admin.reservation.delete', $reservation->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i>Delete</i>
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
