@extends('layouts.app')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/gsm.jpg" class="d-block w-100 banner" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pemuda.jpg" class="d-block w-100 banner" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <a class="btn btn-primary quotes" href="#"> <h5>Aku Melupakan Apa yang telah di belakangku dan berlari-lari kepada tujuan</h5>
        <p>FILIPI 3 : 13-14</p></a>
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/SM.jpg" class="d-block w-100 banner" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>...</h5>
        <p>...</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container jumbo">
    <div class="row justify-content-center">
        <div class="col-10 info-post btn btn-primary">
            <div class="row">
                <div class="col-lg" style="font-family: gotham rounded; ">
                    <div div class="float-sm-center">
                        <h3 class="post">Warta Jemaat</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-section page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 py-3">
          @foreach($wartajemaats as $wartajemaat)
          <article class="blog-entry">
            <div class="entry-header">
              <div class="post-thumbnail">
                <img src="{{asset('storage/'.$wartajemaat->photo)}}" alt="">
              </div>
              <div class="post-date">
                <h3>{{ date("d", strtotime($wartajemaat->tanggal)) }}</h3>
                <span>{{ date("F", strtotime($wartajemaat->tanggal)) }}</span>
              </div>
            </div>
            <div class="post-title">{{$wartajemaat->title}}</div>
            <div class="entry-meta mb-2">
              <div class="meta-item entry-author">
                <div class="icon">
                  <span class="mai-person"></span>  
                </div>
                by <a href="#">Admin</a>
              </div>
              <div class="meta-item">
                <div class="icon">
                  <span class="mai-pricetags"></span>
                </div>
                Category : 
                {{$wartajemaat->category_post_id}}
              </div>
            </div>
            <div class="entry-content">
              <p>{{$wartajemaat->excerpt}}</p>
            </div>
            <a href="{{ route('postdetail',$wartajemaat->id) }}" class="btn btn-primary button">Continue Reading</a>
          </article>
          @endforeach
        </div>
        <!-- Sidebar -->
        <div class="col-lg-4 py-3">
        <div class="widget-wrap">
              <h3 class="widget-title">Category</h3>
              <ul class="categories">
                <li><a href="/warta-jemaat">Warta Jemaat <span>{{$countWartajemaat}}</span></a></li>
                <li><a href="/renungan">Renungan Harian <span>{{$countRenunganharian}}</span></a></li>
                <li><a href="/pengumuman">Pengumuman <span>{{$countPengumuman}}</span></a></li>
              </ul>
            </div>

            <div class="widget-wrap">
              <h3 class="widget-title">Recent Post</h3>
              @foreach ($posts as $post)
              <div class="blog-widget">
                <div class="blog-img">
                  <img src="{{asset('storage/'.$post->photo)}}" alt="">
                </div>
                <div class="entry-footer">
                  <div class="blog-title mb-2">{{$post->title}}</div>
                  <div class="meta">
                    <a href="#"><span class="icon-calendar"></span> {{ date("d F Y", strtotime($post->tanggal)) }}</a>
                    <a href="#"><span class="icon-person"></span> Admin</a>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
        </div> <!-- end sidebar -->
      </div>
    </div>
  </div>
  @endsection