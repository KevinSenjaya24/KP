@extends('layouts.app')

@section('content')
@foreach($notifs as $notif)   
<div style="position: absolute; top: 10; width:250px; height:100px;" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="5000" data-autohide="false">
	<div class="toast-header">
		<span class="rounded mr-2 bg-primary" style="width: 15px;height: 15px"></span>
 
		<strong class="mr-auto">Mengingatkan</strong>
		<small>{{$notif->created_at}}</small>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="toast-body">
		Halo, {{$notif->excerpt}}
		
	</div>
</div>
@endforeach

@if(isset($ultahfirst->nama))
    <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form" data-animation="animated bounceInUp">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{asset('images/cake.png')}}" class="img-responsive" alt="newsletter">
                    </div>
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <!-- <h2 class="banner-title">Happy <span>Birthday</span></h2> -->
                            <a class="aultah"><b>Selamat ulang tahun,</b></a>
                            @foreach($ultah as $jemaat)
                                <a class="aultah" href="https://api.whatsapp.com/send?phone={{$jemaat->no_telp}}"><b>{{$jemaat->nama}},</b></a>
                            @endforeach
                            !
                            <p></p>
                            <b>Mazmur 20:4</b>
                            <p>Kiranya diberikan-Nya kepadamu apa yang kau kehendaki dan dijadikan-Nya berhasil apa yang kau rancangkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    
@endif


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-animation="true">

  <ol class="carousel-indicators">
   @foreach( $banners as $banner )
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
   @endforeach
  </ol>

  <div class="carousel-inner" role="listbox">
    @foreach( $banners as $banner )
       <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="{{ $banner->link }}">
                <img class="d-block img-fluid" src="{{asset('storage/'.$banner->photo)}}" alt="{{ $banner->name }}">
            </a>
       </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-10 info-post">
            <div class="row">
            <div class="col-lg ">
                    <div class="text d-flex">
                        <div class="team-logo d-flex">
                            <div class="img img-2">
                              <img src="logo.jpg" class="logo" alt="">
                            </div>
                        </div>
                        <div div class="float-sm-left" style="font-family: gotham rounded;">
                            <h3 class="text"><span>GKII Majalaya</span></h3>
                            <h3 class="text"><span>Ibadah Umum</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg" style="font-family: gotham rounded;">
                    <div div class="float-sm-left">
                        <div class="img"></div>
                        <h3 class="jam">Pagi : 09.00 - 10.00</h3>
                        <h3 class="jam">Siang : 13.00 - 14.00</h3>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="float-sm-left" style="font-family: viga;">
                        <p><a href="/categoryReservation" class="btn btn-primary py-3 booking">Booking</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-section about bg-light">
  <div class="container container-about">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-5 py-3 wow fadeInUp">
        <h1 class="mb-4">Tentang GKII Majalaya</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, minus id consectetur accusantium illum necessitatibus, non quia sit laboriosam aut libero. Maiores neque velit modi, mollitia nostrum alias quibusdam et.</p>

        
      </div>
      <div class="col-lg-7 py-3 no-scroll-x">
        <div class="accordion accordion-gap" id="accordionFAQ">
          <div class="accordion-item wow fadeInRight">
            <div class="accordion-trigger" id="headingFour">
              <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Siapa Pendeta GKII Majalaya?</button>
            </div>
            <div id="collapse1" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFAQ">
              <div class="accordion-content">
                <p>Pdt. Tabitha Pabuaran</p>
              </div>
            </div>
          </div>
          <div class="accordion-item wow fadeInRight">
            <div class="accordion-trigger" id="headingFive">
              <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Tahun berdiri GKII Majalaya kapan?</button>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFAQ">
              <div class="accordion-content">
                <p>Berdiri pada tanggal </p>
              </div>
            </div>
          </div>
          <div class="accordion-item wow fadeInRight">
            <div class="accordion-trigger" id="headingFive">
              <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse2">Berapa jumlah keluarga yang ada di GKII Majalaya sekarang?</button>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFAQ">
              <div class="accordion-content">
                <p>Jumlah jemaat saat ini ada {{$countfamily}} keluarga</p>
              </div>
            </div>
          </div>
          <div class="accordion-item wow fadeInRight">
            <div class="accordion-trigger" id="headingFive">
              <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse2">Berapa jumlah jemaat GKII Majalaya sekarang?</button>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFAQ">
              <div class="accordion-content">
                <p>Jumlah jemaat saat ini ada {{$countjemaat}} jemaat</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="blog-posts">
    <div class="container">
        <h2 class="title text-center">Reservation Ibadah</h2><!-- End .title-lg text-center -->
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

    <div class="page-wrapper">
        <main class="main">
            <div class="mb-3"></div><!-- End .mb-6 -->
            <div class="container">
                <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#renungan-harian" role="tab" aria-controls="renungan-harian" aria-selected="true">Renungan Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#warta-jemaat" role="tab" aria-controls="warta-jemaat" aria-selected="false">Warta Jemaat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="products-top-link" data-toggle="tab" href="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="false">Pengumuman</a>
                    </li>
                </ul>
            </div><!-- End .container -->

            <div class="container-fluid contain-post">
            <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="renungan-harian" role="tabpanel" aria-labelledby="renungan-harian">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach($renunganharians as $renunganharian)
                            <div class="product product-11 text-center">
                                <figure class="product-media">
                                    <a href="{{ route('postdetail',$renunganharian->id) }}">
                                        <img src="{{asset('storage/'.$renunganharian->photo)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ route('postdetail',$renunganharian->id) }}">{{$renunganharian->title}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <p>{{$renunganharian->tanggal}}</p>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <a href="{{ route('postdetail',$renunganharian->id) }}" class="btn-product"><span>Selengkapnya</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="warta-jemaat" role="tabpanel" aria-labelledby="warta-jemaat">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach($wartajemaats as $wartajemaat)
                            <div class="product product-11 text-center">
                                <figure class="product-media">
                                    <a href="{{ route('postdetail',$wartajemaat->id) }}">
                                        <img src="{{asset('storage/'.$wartajemaat->photo)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ route('postdetail',$wartajemaat->id) }}">{{$wartajemaat->title}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <p>{{$wartajemaat->tanggal}}</p>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <a href="{{ route('postdetail',$wartajemaat->id) }}" class="btn-product"><span>Selengkapnya</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane p-0 fade" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach($pengumumans as $pengumuman)
                            <div class="product product-11 text-center">
                                <div class="product-body">
                                    <h3 class="product-title justify-content-center"><a href="{{ route('postdetail',$pengumuman->id) }}">{{$pengumuman->excerpt}}</a></h3><!-- End .product-title -->
                                    <p></p>
                                    <p>{{$pengumuman->tanggal}}</p>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container-fluid -->

            <div class="mb-6"></div><!-- End .mb-6 -->

            <div class="container">
                <hr class="mt-1 mb-6">
            </div><!-- End .container -->
            
            <div class="blog-posts">
                <div class="container">
                    <h2 class="title text-center">Highlight Warta Jemaat</h2><!-- End .title-lg text-center -->

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
                        @foreach($wartajemaats as $post)
                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="single.html">
                                    <img src="{{asset('storage/'.$post->photo)}}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    {{$post->tanggal}}
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    {{$post->title}}
                                </h3><!-- End .entry-title -->

                                <h6 class="entry-title">
                                    <p>{{$post->excerpt}}<p>
                                </h6><!-- End .entry-title -->

                                <div class="entry-content">
                                    <a href="{{ route('postdetail',$post->id) }}" class="btn btn-outline-darker btn-more">Continue Reading</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                        @endforeach
                        
                    </div><!-- End .owl-carousel -->

                    <div class="more-container text-center mt-2">
                        <a href="/renungan" class="btn btn-outline-darker btn-more"><span>Lebih banyak warta jemaat</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </main><!-- End .main -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
@endsection
