@extends('admin/layouts/layout')
@section('page_title', 'Coupon')
@section('breadcrumb_title', 'Coupon')
@section('coupon_select', 'active')
@section('container')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                    @if (session('message'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Coupon</h3>
                            <a href="{{ url('admin/coupon') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('coupon.manage_coupon_process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" value="{{ $title }}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input id="code" value="{{ $code }}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('code')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input id="value" value="{{ $value }}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('value')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Main content -->
@endsection
