@extends('admin/layouts/layout')
@section('page_title', 'Size')
@section('breadcrumb_title', 'Size')
@section('size_select', 'active')
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
                            <h3 class="card-title">Size</h3>
                            <a href="{{ url('admin/size') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('size.manage_size_process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="size" >Size</label>
                                    <input id="size" value="{{ $size }}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('size')
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
