@extends('front/layout')
@section('page_title', 'Cart Page')
@section('container')

    <!-- catg header banner section -->
    {{-- <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>Cart Page</h2>
         <ol class="breadcrumb">
           <li><a href="index.html">Home</a></li>
           <li class="active">Cart</li>
         </ol>
       </div>
      </div>
    </div>
   </section> --}}
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                @if (isset($list[0]))
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list as $data)
                                                    <tr id="cart_box{{ $data->attr_id }}">
                                                        <td><a class="remove" href="javascript:void(0)" onclick="deleteCartProduct('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}')" >
                                                                <fa class="fa fa-close"></fa>
                                                            </a></td>
                                                        <td><a href="{{ url('product/'.$data->slug) }}"><img src="{{ asset('storage/media/pro_image/'.$data->image) }}" alt="img"></a>
                                                        </td>
                                                        <td><a class="aa-cart-title" href="{{ url('product/'.$data->slug) }}">{{ $data->name }}</a>
                                                            @if($data->size!='')
                                                            <br>SIZE: {{ $data->size }}<br>
                                                            @endif
                                                            @if($data->color!='')
                                                            COLOR: {{ $data->color }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->price }}</td>
                                                        <td><input class="aa-cart-quantity" type="number" id="qty{{ $data->attr_id }}" value="{{ $data->qty }}" onchange="updateQty('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}','{{ $data->price }}')"></td>
                                                        <td id="total_price_{{ $data->attr_id }}">Rs. {{ $data->price*$data->qty }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="aa-cart-view-bottom"><input class="aa-cart-view-btn" type="submit" value="Checkout"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h3>Cart Empty</h3>
                                @endif
                            </form>
                            <!-- Cart Total view -->
                            {{-- <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>$450</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>$450</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
    <input type="hidden" id="qty" name="qty" />
    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id" />
        <input type="hidden" id="color_id" name="color_id" />
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        @csrf
    </form>
@endsection

<script>
    function updateQty(pid,size,color,attr_id,price){
        var qty = $('#qty'+attr_id).val();
        $('#qty').val(qty);
        $('#color_id').val(color);
        $('#size_id').val(size);
        add_to_cart(pid,size,color);
        $('#total_price_'+attr_id).html('Rs.'+qty*price);
    }

    function deleteCartProduct(pid,size,color,attr_id){
        var qty = $('#qty'+attr_id).val();
        $('#qty').val(0);
        $('#color_id').val(color);
        $('#size_id').val(size);
        add_to_cart(pid,size,color);
        $('#cart_box'+attr_id).hide();
    }

    function add_to_cart(id,size_str_id,color_str_id){
        $('#add_to_cart_msg').html('');
        var color_id = $('#color_id').val();
        var size_id = $('#size_id').val();
        if(size_str_id==0 && color_str_id==0){
            size_id  = 'no';
            color_id = 'no';
        }
        if(size_id=='' && size_id!='no'){
            $('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissable" style="margin-top:10px"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>Please Select Size</div>');
        }else if(color_id=='' && color_id!='no'){
            $('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissable" style="margin-top:10px" ><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>Please Select Color</div>');
        }else{
            $('#product_id').val(id);
            $('#pqty').val($('#qty').val());
            jQuery.ajax({
                url:'/add_to_cart',
                data:jQuery('#frmAddToCart').serialize(),
                type:'post',
                success:function(result){
                    console.log(result);
                    alert('Product '+result.msg);
                }
            });
        }

    }
</script>
