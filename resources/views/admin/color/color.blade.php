@extends('admin/layouts/main')
@section('page_title','Color')
@section('color_select','active')
@section('container')
    <!-- MAIN CONTENT-->

    <a href="{{ url('admin/color/manage_color') }}"><button type="button" class="btn btn-success">Add Color</button></a>
    <div class="row m-t-30">
        <div class="col-md-12">
            @if(session('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->color }}</td>
                            <td>
                                @if($list->status==1)
                                    <a href="{{ url('admin/color/status/0') }}/{{ $list->id }}"><button type="button" class="btn btn-success">Active</button></a>
                                @elseif($list->status==0)
                                    <a href="{{ url('admin/color/status/1') }}/{{ $list->id }}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                @endif
                                {{-- <a href="category/delete/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a> --}}
                                <a href="{{ url('admin/color/manage_color/') }}/{{ $list->id }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <a href="{{ url('admin/color/delete/') }}/{{ $list->id }}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>

    <!-- END MAIN CONTENT-->
@endsection
