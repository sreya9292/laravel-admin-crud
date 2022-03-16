@extends('admin/layouts/layout')
@section('page_title', 'Brand')
@section('breadcrumb_title', 'Brand')
@section('brand_select', 'active')
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
                            <h3 class="card-title">Brand</h3>
                            <a href="{{ url('admin/brand') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('brand.manage_brand_process') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name">Brand</label>
                                    <input id="brand_name" value="{{ $brand_name }}" name="brand_name"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('brand_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input id="brand_image" name="brand_image" type="file" class="form-control" aria-required="true"
                                        aria-invalid="false"
                                        @if ($id > 0) {{ $image_required = '' }}
                                    @else
                                        {{ $image_required = 'required' }} @endif>

                                    @if ($brand_image != '')
                                        <img src="{{ asset('storage/media/brand/' . $brand_image) }}"
                                            width="100px;" height="100px;">
                                    @endif
                                    @error('brand_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="is_home">Show In Home Page</label>
                                    <input type="checkbox" name="is_home" value="on" @if($is_home==1) {{ $is_home_value }} @else {{ $is_home_value }} @endif>
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
