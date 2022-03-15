@extends('admin/layouts/layout')
@section('page_title', 'Home Banner')
@section('breadcrumb_title', 'Home Banner')
@section('home_banner_select', 'active')
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
                            <h3 class="card-title">Banner List</h3>
                            <a href="{{ url('admin/home_banner/manage_home_banner') }}" ><button type="button" class="btn btn-default" style="float: right;">Add
                                Banner + </button></a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Banner Image</th>
                                        <th>Button Text</th>
                                        <th>Button Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>
                                                @if ($list->category_image != '')
                                                    <img src="{{ asset('storage/media/banner/' . $list->image) }}" width="100px;"
                                                        height="100px;">
                                                @endif
                                            </td>
                                            <td>{{ $list->btn_text }}</td>
                                            <td>{{ $list->btn_link }}</td>

                                            <td>
                                                @if ($list->status == 1)
                                                    <a href="{{ url('admin/home_banner/status/0') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-success">Active</button></a>
                                                @elseif($list->status == 0)
                                                    <a href="{{ url('admin/home_banner/status/1') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-warning">Deactive</button></a>
                                                @endif
                                            </td>
                                            <td>

                                                {{-- <a href="home_banner/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a> --}}
                                                {{-- <a href="{{ url('admin/home_banner/manage_home_banner/') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Edit</button></a> --}}
                                                <a href="{{ url('admin/home_banner/manage_home_banner/') }}/{{ $list->id }}" class="btn btn-outline-info btn-sm"><i class="fas fa-pencil-alt">
                                                </i></a>

                                                <a href="{{ url('admin/home_banner/delete/') }}/{{ $list->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash">
                                                </i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Banner Image</th>
                                        <th>Button Text</th>
                                        <th>Button Link</th>
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
