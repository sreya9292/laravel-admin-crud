<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{ url('admin/dashboard') }}">
                    {{-- <img src="{{ asset('admin_assets/images/icon/logo.png') }}" alt="CoolAdmin" /> --}}
                    {{ Config::get('constants.SITE_NAME') }}
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li >
                    <a  href="{{ url('admin/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li >
                    <a href="{{ url('admin/category') }}">
                        <i class="fas fa-tachometer-alt"></i>Category</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
