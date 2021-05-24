<!--<nav class="main-header navbar navbar-expand navbar-white navbar-light">-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav "  >
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <img src="{{ asset('adminLte/img/LOGO I-CARE-1.png') }}" width="120px" height="49px">
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="{{ Auth::user()->Pegawai->getAvatar() }}" class="rounded-circle
                mr-1"> --}}
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Session::get('name') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                
                {{-- <a href="{{ route('change-password') }}" class="dropdown-item has-icon text-dark">
                    <i class="fas fa-fw fa-key"></i> Change Password
                </a> --}}
                {{-- <div class="dropdown-divider"></div> --}}
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-fw fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>


