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
                   
                   
                    
                    {{ __('You are logged in!') }} {{ Auth::user()->jemaat->name }}  

                    <form action="{{ route('reservation.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nama">Category Reservation ID</label>
                        <input type="text" name="category_reservation_id" class="form-control" id="category_reservation_id" value="3" aria-describedby="jemaat" placeholder="Enter Name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jemaat ID</label>
                        <input type="text" name="jemaat_id" class="form-control" id="nama" value="{{ Auth::user()->jemaat->id }}" aria-describedby="jemaat" placeholder="Enter Name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Value</label>
                        <input type="text" name="value" class="form-control" id="value" value="1" aria-describedby="jemaat" placeholder="Enter Name" readonly>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
