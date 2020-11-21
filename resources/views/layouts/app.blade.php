<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GKII Majalaya</title>
    <meta name="description" content="GKII Majalaya">
    <meta name="author" content="gkii majalaya">
    <link rel="shortcut icon" href="{{asset('images/about/logo.png')}}">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <!-- datatables style -->
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/jquery.countdown.css')}}">
    @yield('pluginLink')
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/skins/skin-demo-2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demos/demo-2.css')}}">
    <link rel="stylesheet" href="{{asset('css/maicons.css')}}">

    <link rel="stylesheet" href="{{asset('css/mobster.css')}}">
    
  
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('style.css')}}">
</head>

<body>
<div class="preloader">
    <div class="loading">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
</div>
    
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">GKII Majalaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto">
                @guest
                    @if (Route::has('register'))
                        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="/comment">Doa</a>
                        <a class="nav-link" href="/categoryReservation">Reservation</a>
                        <a class="nav-link" href="https://www.youtube.com/channel/UCtxnHoeZztwGkPSltMRUyCQ">Video Youtube</a>
                        <li class="nav-item">
                            <a class="btn btn-primary tombol" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="/comment">Doa</a>
                <a class="nav-link" href="/categoryReservation">Reservation</a>
                <a class="nav-link" href="https://www.youtube.com/channel/UCtxnHoeZztwGkPSltMRUyCQ">Video Youtube</a>
                <li class="nav-item dropdown">
                <!-- <a class="nav-link" href="/home"><img src="{{asset('storage/'.Auth::user()->jemaat->photo)}}" class="rounded-circle"/></a> -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role=="superadmin" || Auth::user()->role=="admin" || Auth::user()->role=="adminibadah" || Auth::user()->role=="adminpost")
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ url('update-profile/{id}') }}">
                            Update profile
                            </a>
                            <a class="dropdown-item" href="/admin/dashboard">
                            Halaman Admin
                            </a>

                        @else
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ url('update-profile/{id}') }}">
                            Update profile
                            </a>
                        @endif
                    </div>
                </li>
                @endguest
            </ul>
        </div>
  </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

@include('layouts.footer')

    <!-- Plugins JS File -->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/superfish.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{('js/demos/demo-2.js')}}"></script>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="../assets/vendor/wow/wow.min.js"></script>
    <script src="../assets/js/mobster.js"></script>
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
    <script>
        function myFunction() {
        alert("Silahkan Login terlebih dahulu");
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable1').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableFebruari').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableMaret').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableApril').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableMei').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableJuni').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableJuli').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableAgustus').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableSeptember').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableOktober').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableNovember').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableDesember').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableJemaat').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#myTableLaguIbadah').DataTable();
        } );
    </script>
    <script>
        function myFunction() {
        alert("Silahkan Login terlebih dahulu");
        }
    </script>
    <script>
		$('.toast').toast('show');
    </script>
    <script>
    $(document).ready(function() {
        $(".preloader").fadeOut("slow");
    });
</script>
</body>


<!-- molla/index-1.html  22 Nov 2019 09:55:32 GMT -->
</html>