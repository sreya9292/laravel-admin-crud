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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Title</label>
                                            <input id="title" value="{{ $title }}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('title')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="code">Code</label>
                                            <input id="code" value="{{ $code }}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('code')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="type">Value Type</label>
                                            <select id="type" name="type" class="form-control"
                                            aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Any One</option>
                                                <option value="Value" @if($type=="Value") selected @endif >Value</option>
                                                <option value="Per" @if($type=="Per") selected @endif  >Percentage</option>
                                            </select>
                                            @error('type')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="value">Value</label>
                                            <input id="value" value="{{ $value }}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('value')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="min_order_amt">Min Order Amt</label>
                                            <input id="min_order_amt" value="{{ $min_order_amt }}" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('min_order_amt')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="is_one_time">Is One Time</label>
                                            <select id="is_one_time" name="is_one_time" class="form-control"
                                            aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Any One</option>
                                                <option value="1" @if($is_one_time=="1") selected @endif >Yes</option>
                                                <option value="0" @if($is_one_time=="0") selected @endif  >No</option>
                                            </select>
                                            @error('is_one_time')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <input type="hidden" name="id" value="{{ $id }}" />

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
