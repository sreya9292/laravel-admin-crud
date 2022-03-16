@extends('admin/layouts/layout')
@section('page_title', 'Tax')
@section('breadcrumb_title', 'Tax')
@section('tax_select', 'active')
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
                            <h3 class="card-title">Tax</h3>
                            <a href="{{ url('admin/tax') }}"><button type="button"
                            class="btn btn-default" style="float: right;">Back</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('tax.manage_tax_process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tax_desc" >Tax Desc</label>
                                    <input id="tax_desc" value="{{ $tax_desc }}" name="tax_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('tax_desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tax_value" >Tax Value</label>
                                    <input id="tax_value" value="{{ $tax_value }}" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('tax_value')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
