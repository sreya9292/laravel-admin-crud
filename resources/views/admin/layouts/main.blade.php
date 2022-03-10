@extends('admin/layouts/layout')
<div class="page-wrapper">
    @extends('admin/layouts/header-mobile')
    @extends('admin/layouts/sidebar')
    <div class="page-container">
        @extends('admin/layouts/header-desktop')
        <div class="main-content">
            <div class="section__content">
                <div class="container-fluid">
                    @section('container')
                    @show
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
