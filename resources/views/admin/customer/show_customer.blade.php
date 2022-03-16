@extends('admin/layouts/layout')
@section('page_title', 'Show Customer Details')
@section('breadcrumb_title', 'Show Customer Details')
@section('customer_select', 'active')
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
                            <h3 class="card-title">Customer Details</h3>
                            <a href="{{ url('admin/customer') }}"><button type="button" class="btn btn-default"
                                    style="float: right;">Back</button></a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered ">
                                <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>{{ $customer_list->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mobile</strong></td>
                                        <td>{{ $customer_list->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $customer_list->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address</strong></td>
                                        <td>{{ $customer_list->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City</strong></td>
                                        <td>{{ $customer_list->city }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>State</strong></td>
                                        <td>{{ $customer_list->state }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Zip</strong></td>
                                        <td>{{ $customer_list->zip }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Company</strong></td>
                                        <td>{{ $customer_list->company }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created On</strong></td>
                                        <td>{{  \Carbon\Carbon::parse($customer_list->created_at)->format('d-m-Y h:i:s')  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Updated On</strong></td>
                                        <td>{{  \Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-Y')  }}</td>
                                    </tr>
                                </tbody>
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
