<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
        height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle fa-2x"></i>
                <span class="badge badge-success navbar-badge">Active</span>
                <!--  <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('admin/change-password') }}" role="menuitem"><i class="fas fa-cog"></i>
                    Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('admin/logout') }}" role="menuitem"><i class="fas fa-power-off"></i>
                    Logout</a>
            </div>
        </li>
    </ul>
</nav>
