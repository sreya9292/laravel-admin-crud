@extends('admin/layouts/layout')
@section('page_title', 'Category')
@section('breadcrumb_title', 'Category')
@section('category_select', 'active')
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
                            <h3 class="card-title">Category</h3>
                            <a href="{{ url('admin/category') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('category.manage_category_process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name">Category</label>
                                    <input id="category_name" value="{{ $category_name }}" name="category_name"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('category_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_slug">Category Slug</label>
                                    <input id="category_slug" value="{{ $category_slug }}" name="category_slug"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false"
                                        required>
                                    @error('category_slug')
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
