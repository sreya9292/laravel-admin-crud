@extends('admin/layouts/main')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')
    <!-- MAIN CONTENT-->

    <a href="{{ url('admin/coupon') }}"><button type="button" class="btn btn-success">Back</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('message'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Manage Coupon</div>
                        <div class="card-body">
                            {{-- <div class="card-title">
                                <h3 class="text-center title-2">Manage Category</h3>
                            </div>
                            <hr> --}}
                            <form action="{{ route('coupon.manage_coupon_process') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" value="{{ $title }}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="code" class="control-label mb-1">Code</label>
                                    <input id="code" value="{{ $code }}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('code')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="value" class="control-label mb-1">Value</label>
                                    <input id="value" value="{{ $value }}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('value')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>

                                <input type="hidden" name="id" value="{{ $id }}" />
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- END MAIN CONTENT-->
@endsection
