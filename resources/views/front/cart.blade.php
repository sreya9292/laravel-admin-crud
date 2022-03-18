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
                                                    <tr>
                                                        <td><a class="remove" href="#">
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
                                                        <td><input class="aa-cart-quantity" type="number" id="qty" value="{{ $data->qty }}" onchange="updateQty('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}')"></td>
                                                        <td>Rs. {{ $data->price*$data->qty }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="aa-cart-view-bottom"><input class="aa-cart-view-btn" type="submit" value="Checkout"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h3>Data Not Found</h3>
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

@endsection

<script>
    function updateQty(){

    }
</script>
