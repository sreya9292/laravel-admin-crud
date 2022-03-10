@extends('admin/layouts/main')
@section('page_title','Manage Category')
@section('category_select','active')
@section('container')
    <!-- MAIN CONTENT-->

    <a href="{{ url('admin/category') }}"><button type="button" class="btn btn-success" >Back</button></a>
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
                        {{-- <div class="card-header">Credit Card</div> --}}
                        <div class="card-body">
                            {{-- <div class="card-title">
                                <h3 class="text-center title-2">Manage Category</h3>
                            </div>
                            <hr> --}}
                            <form action="{{ route('category.manage_category_process') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category</label>
                                    <input id="category_name" value="{{ $category_name }}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('category_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                    <input id="category_slug" value="{{ $category_slug }}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('category_slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div >
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
