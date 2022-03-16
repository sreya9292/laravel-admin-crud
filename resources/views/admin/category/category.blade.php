@extends('admin/layouts/layout')
@section('page_title', 'Category')
@section('breadcrumb_title', 'Category')
@section('category_select', 'active')
@section('container')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                            <h3 class="card-title">Category List</h3>
                            <a href="{{ url('admin/category/manage_category') }}" ><button type="button" class="btn btn-default" style="float: right;">Add
                                Category + </button></a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->category_name }}</td>
                                            <td>{{ $list->category_slug }}</td>
                                            <td>
                                                @if ($list->category_image != '')
                                                    <img src="{{ asset('storage/media/category/' . $list->category_image) }}" width="100px;"
                                                        height="100px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($list->status == 1)
                                                    <a href="{{ url('admin/category/status/0') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-success">Active</button></a>
                                                @elseif($list->status == 0)
                                                    <a href="{{ url('admin/category/status/1') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-warning">Deactive</button></a>
                                                @endif
                                            </td>
                                            <td>

                                                {{-- <a href="category/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a> --}}
                                                {{-- <a href="{{ url('admin/category/manage_category/') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Edit</button></a> --}}
                                                <a href="{{ url('admin/category/manage_category/') }}/{{ $list->id }}" class="btn btn-outline-info btn-sm"><i class="fas fa-pencil-alt">
                                                </i></a>

                                                <a href="{{ url('admin/category/delete/') }}/{{ $list->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash">
                                                </i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- End Main content -->
@endsection
