<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollright">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">GKII Majalaya</span></h3> </div>
        <ul class="nav" id="side-menu">
        @if (auth()->user()->role=="superadmin")
            <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
            <li><a href="{{ url('home') }}" class="waves-effect"><i class="fa-fw">H</i> <span class="hide-menu">Home</span></a>
            <li><a href="{{ url('admin/banner') }}" class="waves-effect"><i class="mdi mdi-application fa-fw"></i> <span class="hide-menu">Banner</span></a></li>
            <li><a href="{{ url('admin/user') }}" class="waves-effect"><i class="mdi mdi-account-circle fa-fw"></i> <span class="hide-menu">User</span></a></li>
            <li><a href="{{ url('admin/family') }}" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> <span class="hide-menu">Family</span></a></li>
            <li><a href="{{ url('admin/jemaat') }}" class="waves-effect"><i class="mdi mdi-account-box-outline fa-fw"></i> <span class="hide-menu">Jemaat</span></a></li>
            <li><a href="{{ url('admin/bpj') }}" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">BPJ</span></a></li>
            <li><a href="{{ url('admin/categoryPelayan') }}" class="waves-effect"><i class="mdi mdi-account-outline fa-fw"></i> <span class="hide-menu">Category Pelayan</span></a></li>
            <li><a href="{{ url('admin/pelayan') }}" class="waves-effect"><i class="mdi mdi-account-multiple-outline fa-fw"></i> <span class="hide-menu">Pelayan</span></a></li>
            <!-- <li><a href="{{ url('admin/pelayanan') }}" class="waves-effect"><i class="mdi mdi-account-switch fa-fw"></i> <span class="hide-menu">Pelayanan</span></a></li> -->
            <li><a href="{{ url('admin/categoryReservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Reservation</span></a></li>
            <!-- <li><a href="{{ url('admin/reservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Reservation</span></a></li> -->
            <li><a href="{{ url('admin/categoryPost') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Post</span></a></li>
            <li><a href="{{ url('admin/lagu') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu</span></a></li>
            <!-- <li><a href="{{ url('admin/laguIbadah') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu Ibadah</span></a></li> -->
            
            <li class="devider"></li>
            <li><a href="#" class="logout-button waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        @elseif (auth()->user()->role=="admin")
        <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
            <li><a href="{{ url('home') }}" class="waves-effect"><i class="fa-fw">H</i> <span class="hide-menu">Home</span></a>
            <li><a href="{{ url('admin/banner') }}" class="waves-effect"><i class="mdi mdi-application fa-fw"></i> <span class="hide-menu">Banner</span></a></li>
            <li><a href="{{ url('admin/family') }}" class="waves-effect"><i class="mdi mdi-account-card-details fa-fw"></i> <span class="hide-menu">Family</span></a></li>
            <li><a href="{{ url('admin/jemaat') }}" class="waves-effect"><i class="mdi mdi-account-box-outline fa-fw"></i> <span class="hide-menu">Jemaat</span></a></li>
            <li><a href="{{ url('admin/bpj') }}" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">BPJ</span></a></li>
            <li><a href="{{ url('admin/categoryPelayan') }}" class="waves-effect"><i class="mdi mdi-account-outline fa-fw"></i> <span class="hide-menu">Category Pelayan</span></a></li>
            <li><a href="{{ url('admin/pelayan') }}" class="waves-effect"><i class="mdi mdi-account-multiple-outline fa-fw"></i> <span class="hide-menu">Pelayan</span></a></li>
            <!-- <li><a href="{{ url('admin/pelayanan') }}" class="waves-effect"><i class="mdi mdi-account-switch fa-fw"></i> <span class="hide-menu">Pelayanan</span></a></li> -->
            <li><a href="{{ url('admin/categoryReservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Reservation</span></a></li>
            <!-- <li><a href="{{ url('admin/reservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Reservation</span></a></li> -->
            <li><a href="{{ url('admin/categoryPost') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Post</span></a></li>
            <li><a href="{{ url('admin/lagu') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu</span></a></li>
            <!-- <li><a href="{{ url('admin/laguIbadah') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu Ibadah</span></a></li> -->
            
            <li class="devider"></li>
            <li><a href="#" class="logout-button waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        @elseif (auth()->user()->role=="adminpost")
            <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
            <li><a href="{{ url('home') }}" class="waves-effect"><i class="fa-fw">H</i> <span class="hide-menu">Home</span></a>
            <li><a href="{{ url('admin/categoryPost') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Post</span></a></li>
            <li class="devider"></li>
            <li><a href="#" class="logout-button waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        @elseif (auth()->user()->role=="adminibadah")
            <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
            <li><a href="{{ url('home') }}" class="waves-effect"><i class="fa-fw">H</i> <span class="hide-menu">Home</span></a>
            <li><a href="{{ url('admin/banner') }}" class="waves-effect"><i class="mdi mdi-application fa-fw"></i> <span class="hide-menu">Banner</span></a></li>
            <li><a href="{{ url('admin/categoryPelayan') }}" class="waves-effect"><i class="mdi mdi-account-outline fa-fw"></i> <span class="hide-menu">Category Pelayan</span></a></li>
            <li><a href="{{ url('admin/pelayan') }}" class="waves-effect"><i class="mdi mdi-account-multiple-outline fa-fw"></i> <span class="hide-menu">Pelayan</span></a></li>
            <!-- <li><a href="{{ url('admin/pelayanan') }}" class="waves-effect"><i class="mdi mdi-account-switch fa-fw"></i> <span class="hide-menu">Pelayanan</span></a></li> -->
            <li><a href="{{ url('admin/categoryReservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Category Reservation</span></a></li>
            <!-- <li><a href="{{ url('admin/reservation') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Reservation</span></a></li> -->
            <li><a href="{{ url('admin/lagu') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu</span></a></li>
            <!-- <li><a href="{{ url('admin/laguIbadah') }}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Lagu Ibadah</span></a></li> -->
            <li class="devider"></li>
            <li><a href="#" class="logout-button waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        @elseif (auth()->user()->role=="adminverification")
            <li><a href="{{ url('/admin/dashboard') }}" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
            <li><a href="{{ url('home') }}" class="waves-effect"><i class="fa-fw">H</i> <span class="hide-menu">Home</span></a>
            <li><a href="{{ url('admin/user') }}" class="waves-effect"><i class="mdi mdi-account-circle fa-fw"></i> <span class="hide-menu">User</span></a></li>
            <li class="devider"></li>
            <li><a href="#" class="logout-button waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
        @endif
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->
