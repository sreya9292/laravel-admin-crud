<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
        {{ Config::get('constants.SITE_NAME') }}
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link @yield('dashboard_select')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/category') }}" class="nav-link @yield('category_select')">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('admin/coupon') }}" class="nav-link @yield('coupon_select')">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Coupon
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/size') }}" class="nav-link @yield('size_select')">
                        <i class="nav-icon fas fa-window-maximize"></i>
                        <p>
                            Size
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/color') }}" class="nav-link @yield('color_select')">
                        <i class="nav-icon fas fa-paint-brush"></i>
                        <p>
                            Colour
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/product') }}" class="nav-link @yield('product_select')">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>


            </ul>
        </nav>

    </div>

</aside>
