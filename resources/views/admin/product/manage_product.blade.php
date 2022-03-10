@extends('admin/layouts/main')
@section('page_title','Manage Product')
@section('product_select','active')
@section('container')


    <!-- MAIN CONTENT-->
    <a href="{{ url('admin/product') }}"><button type="button" class="btn btn-success">Back</button></a>
    @if(session()->has('sku_error'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Oops</span>
            {{ session('sku_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @error('attr_image.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Oops</span>
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror

    @error('images.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Oops</span>
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror

    <div class="row m-t-30">
        <div class="col-md-12">
            <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-12">
                        @if(session()->has('message'))
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
                                    <h3 class="text-center title-2">Manage product</h3>
                                </div>
                                <hr> --}}
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Product Name</label>
                                    <input id="name" value="{{ $name }}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug" class="control-label mb-1">Slug</label>
                                    <input id="slug" value="{{ $slug }}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Image</label>
                                    <input id="image"  name="image" type="file" class="form-control" aria-required="true" aria-invalid="false"
                                    @if($id>0)
                                        {{ $image_required="" }}
                                    @else
                                        {{ $image_required="required" }}
                                    @endif>
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_id" class="control-label mb-1">Category</label>
                                            <select id="category_id"  name="category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Category</option>
                                                @foreach ($category as $list)
                                                    @if($category_id==$list->id)
                                                        <option selected value="{{ $list->id }}">
                                                    @else
                                                        <option value="{{ $list->id }}">
                                                    @endif
                                                        {{ $list->category_name }}</option>
                                                @endforeach

                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="brand" class="control-label mb-1">Brand</label>
                                            <input id="brand"  value="{{ $brand }}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('brand')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="model" class="control-label mb-1">Model</label>
                                            <input id="model" value="{{ $model }}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('model')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="short_desc" class="control-label mb-1">Short Description</label>
                                    <textarea id="short_desc"  name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $short_desc }}</textarea>
                                    @error('short_desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="desc" class="control-label mb-1">Description</label>
                                    <textarea id="desc"  name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $desc }}</textarea>
                                    @error('desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keywords" class="control-label mb-1">Keywords</label>
                                    <textarea id="keywords"  name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $keywords }}</textarea>
                                    @error('keywords')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                    <textarea id="technical_specification"  name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $technical_specification }}</textarea>
                                    @error('technical_specification')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="uses" class="control-label mb-1">Uses</label>
                                    <textarea id="uses"  name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $uses }}</textarea>
                                    @error('uses')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="warranty" class="control-label mb-1">Warranty</label>
                                    <textarea id="warranty"  name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{ $warranty }}</textarea>
                                    @error('warranty')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4>Product Attributes</h4><br>

                <div class="row" >
                    <div class="col-lg-12" id="product_attr_box">
                        @php
                            $loop_count_num=1;
                        @endphp
                        @foreach($productAttrArr as $key=>$val)
                        @php
                            $loop_count_prev = $loop_count_num;
                            $pArr = (array)$val;
                        @endphp
                        <input id="paid"  name="paid[]" type="hidden" value="{{ $pArr['id']  }}" >

                        <div class="card" id="product_attr_{{ $loop_count_num++ }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                            <input id="sku"  name="sku[]" type="text" value={{ $pArr['sku']  }} class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('sku')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-2">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input id="mrp"  name="mrp[]" type="text" value={{ $pArr['mrp']  }} class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('mrp')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-2">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input id="price"  name="price[]" type="text" value={{ $pArr['price']  }} class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('price')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                            <select id="size_id"  name="size_id[]" value={{ $pArr['sku']  }} class="form-control" aria-required="true" aria-invalid="false" >
                                                <option value="">Select Size</option>
                                                @foreach ($sizes as $list)
                                                    @if($pArr['size_id']==$list->id)
                                                        <option selected value="{{ $list->id }}">{{ $list->size }}</option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->size }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @error('size_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                        <div class="col-md-3">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select id="color_id"  name="color_id[]"  class="form-control" aria-required="true" aria-invalid="false" >
                                                <option value="">Select Color</option>
                                                @foreach ($colors as $list)
                                                    @if($pArr['color_id']==$list->id)
                                                        <option selected value="{{ $list->id }}">{{ $list->color }}</option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->color }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                            @error('color_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-2">
                                            <label for="qty" class="control-label mb-1">Qty</label>
                                            <input id="qty"  name="qty[]" type="text" value={{ $pArr['qty']  }} class="form-control" aria-required="true" aria-invalid="false" required>
                                            @error('qty')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="attr_image" class="control-label mb-1">Image</label>
                                            <input type="file" id="attr_image"  name="attr_image[]"  class="form-control" aria-required="true" aria-invalid="false" >
                                            @if($pArr['attr_image']!='')<img src="{{ asset('storage/media/'.$pArr['attr_image']) }}" width="100px;" height="100px;">@endif
                                        </div>

                                        <div class="col-md-2">
                                            <label for="attr_image" class="control-label mb-1">&nbsp;Action</label>
                                            @if($loop_count_num==2)
                                                <button type="button" class="btn btn-success btn-lg" onclick="add_more();"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                            @else
                                                {{-- <button type="button" class="btn btn-danger btn-lg" onclick="remove_more('{{ loop_count_prev }}');"><i class="fa fa-minus"></i>&nbsp;Remove</button> --}}
                                                <a href="{{ url('admin/product/product_attr_delete') }}/{{ $pArr['id'] }}/{{ $id }}"><button type="button" class="btn btn-danger btn-lg"><i class="fa fa-minus"></i>&nbsp;Remove</button></a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <h4>Product Images</h4><br>

                <div class="row" >
                    <div class="col-lg-12" >

                        <div class="card" >
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row" id="product_images_box">

                                        @php
                                            $loop_count_num=1;
                                        @endphp
                                        @foreach($productImagesArr as $key=>$val)
                                        @php
                                            $loop_count_prev = $loop_count_num;
                                            $pIArr = (array)$val;
                                        @endphp
                                        <input id="piid"  name="piid[]" type="hidden" value="{{ $pIArr['id']  }}" >

                                        <div class="col-md-4 product_images_{{ $loop_count_num++ }}" >
                                            <label for="images" class="control-label mb-1">Image</label>
                                            <input type="file" id="images"  name="images[]"  class="form-control" aria-required="true" aria-invalid="false" >
                                            @if($pIArr['images']!='')<img src="{{ asset('storage/media/'.$pIArr['images']) }}" width="100px;" height="100px;">@endif
                                        </div>

                                        <div class="col-md-2">
                                            <label for="button" class="control-label mb-1">&nbsp;Action</label>
                                            @if($loop_count_num==2)
                                                <button type="button" class="btn btn-success btn-lg" onclick="add_image_more();"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                            @else
                                                {{-- <button type="button" class="btn btn-danger btn-lg" onclick="remove_more('{{ loop_count_prev }}');"><i class="fa fa-minus"></i>&nbsp;Remove</button> --}}
                                                <a href="{{ url('admin/product/product_images_delete') }}/{{ $pIArr['id'] }}/{{ $id }}"><button type="button" class="btn btn-danger btn-lg"><i class="fa fa-minus"></i>&nbsp;Remove</button></a>
                                            @endif
                                        </div>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>

                <input type="hidden" name="id" value="{{ $id }}" />

            </form>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <script>
        var loop_count = 1;
        function add_more(){
            loop_count++;
            var html = '<input id="paid"  name="paid[]" type="hidden" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';
            html+='<div class="col-md-2"><label for="sku" class="control-label mb-1">SKU</label><input id="sku"  name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
            html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp"  name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
            html+='<div class="col-md-2"><label for="price" class="control-label mb-1">Price</label><input id="price"  name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
            var size_id_html = jQuery('#size_id').html();
            size_id_html = size_id_html.replace("selected","");
            html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label> <select id="size_id"  name="size_id[]" class="form-control" aria-required="true" aria-invalid="false" >'+size_id_html+'</select></div>';
            var color_id_html = jQuery('#color_id').html();
            color_id_html = color_id_html.replace("selected","");
            html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1">Color</label> <select id="color_id"  name="color_id[]" class="form-control" aria-required="true" aria-invalid="false" >'+color_id_html+'</select></div>';
            html+='<div class="col-md-2"><label for="qty" class="control-label mb-1">Qty</label><input id="qty"  name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
            html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1">Image</label><input type="file" id="attr_image"  name="attr_image[]"  class="form-control" aria-required="true" aria-invalid="false" required></div>';
            html+='<div class="col-md-2"><label for="remove_btn" class="control-label mb-1">&nbsp;Action</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i>&nbsp;Remove</button></div>';
            html+= '</div></div></div></div>';
            jQuery("#product_attr_box").append(html);
        }

        function remove_more(loop_count){
            jQuery('#product_attr_'+loop_count).remove();
        }

        var loop_image_count =1;
        function add_image_more(){
            loop_image_count++;
            var html='<input id="piid"  name="piid[]" type="hidden" ><div class="col-md-4 product_images_'+loop_image_count+'" ><label for="images" class="control-label mb-1">Image</label><input type="file" id="images"  name="images[]"  class="form-control" aria-required="true" aria-invalid="false" ></div>';
            html+='<div class="col-md-2 product_images_'+loop_image_count+'"><label for="remove_btn" class="control-label mb-1">&nbsp;Action</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image_more("'+loop_image_count+'")><i class="fa fa-minus"></i>&nbsp;Remove</button></div>';
            jQuery("#product_images_box").append(html);
        }

        function remove_image_more(loop_image_count){
            jQuery('.product_images_'+loop_image_count).remove();
        }
    </script>
@endsection
