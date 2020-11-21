@extends('layouts.app')

@section('content')
<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-8 info-post btn btn-primary">
            <div class="row">
                <div class="col-lg" style="font-family: gotham rounded; ">
                    <div div class="float-sm-center">
                        <h3 class="post">Reservation Ibadah</h3>
                        <p><b>Ibrani 10:25-26</b></p>
                        <p><sup>10:25 </sup>Janganlah kita menjauhkan diri 
                        dari pertemuan-pertemuan ibadah kita, 
                        seperti dibiasakan oleh beberapa orang, 
                        tetapi marilah kita saling menasihati, 
                        dan semakin giat melakukannya menjelang hari Tuhan yang mendekat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-posts">
    <div class="container">
        <!-- <h2 class="title text-center">Reservation Ibadah</h2>End .title-lg text-center -->
        @if (session('success'))
        <br>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <br>
        @endif
        @if (session('error'))
            <br>
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            <br>
        @endif
        <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "600": {
                        "items":2
                    },
                    "992": {
                        "items":3
                    }
                }
            }'>
            @foreach($categories as $category)
            <div class="col-lg">
                <div class="card card-body border-0 text-center shadow pt-5">
                    <img src="{{asset('storage/'.$category->photo)}}" class="imageReservation" alt="">
                <h5 class="fg-gray">{{$category->name}}</h5>
                <p class="fs-small">{{$category->tanggal}}</p>
                <a href="{{ route('categoryReservation.detail',$category->id) }}" class="btn btn-primary btn-reservation">Booking</a>
                <br>
                <a href="{{ route('categoryReservation.show',$category->id) }}" class="btn btn-primary btn-reservation">Show</a>
                
                </div>
            </div>
                @endforeach
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div><!-- End .blog-posts -->
@endsection