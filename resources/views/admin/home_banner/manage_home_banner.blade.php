@extends('admin/layouts/layout')
@section('page_title', 'Home Banner')
@section('breadcrumb_title', 'Home Banner')
@section('home_banner_select', 'active')
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
                            <h3 class="card-title">Home Banner</h3>
                            <a href="{{ url('admin/home_banner') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('home_banner.manage_home_banner_process') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" value="{{ $title }}" name="title"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('title')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>{{ $description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="btn_txt">Button Text</label>
                                    <input id="btn_txt" value="{{ $btn_txt }}" name="btn_txt"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('btn_txt')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="btn_link">Button Link</label>
                                    <input id="btn_link" value="{{ $btn_link }}" name="btn_link"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('btn_link')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Banner Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true"
                                        aria-invalid="false"
                                        @if ($id > 0) {{ $image_required = '' }}
                                    @else
                                        {{ $image_required = 'required' }} @endif>
                                    @error('image')
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
