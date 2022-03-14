@extends('admin/layouts/layout')
@section('page_title', 'Coupon')
@section('breadcrumb_title', 'Coupon')
@section('coupon_select', 'active')
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
                            <h3 class="card-title">Coupon List</h3>
                            <a href="{{ url('admin/coupon/manage_coupon') }}"><button type="button"
                                    class="btn btn-default" style="float: right;">Add
                                    Coupon + </button></a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Value</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->title }}</td>
                                            <td>{{ $list->code }}</td>
                                            <td>{{ $list->value }}</td>

                                            <td>
                                                {{-- <a href="category/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a> --}}

                                                @if ($list->status == 1)
                                                    <a href="{{ url('admin/coupon/status/0') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-success">Active</button></a>
                                                @elseif($list->status == 0)
                                                    <a href="{{ url('admin/coupon/status/1') }}/{{ $list->id }}"><button
                                                            type="button" class="btn btn-warning">Deactive</button></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/coupon/manage_coupon/') }}/{{ $list->id }}" class="btn btn-outline-info btn-sm"><i class="fas fa-pencil-alt">
                                                </i></a>
                                                <a href="{{ url('admin/coupon/delete/') }}/{{ $list->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash">
                                                </i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Value</th>
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
