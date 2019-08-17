@extends('front.layout.master')
@section('header_js')
    @parent
@endsection
@section('front_content')
    <!--================Categories Banner Area =================-->
    <section class="solid_banner_area">
        <div class="container">
            <div class="solid_banner_inner">
                <h3>Order Details</h3>
                <ul>
                    <li><a href="javascript:void(0)">Home</a></li>
                    <li><a href="javascript:void(0)">order</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Shopping Cart Area =================-->
    <section class="shopping_cart_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart_items">
                        <h3>Your Order Items</h3>
                        <div class="table-responsive-md">
                            <table class="table">
                                <tbody>
                                    <tr style="background-color: antiquewhite">
                                        {{--  <th scope="row">
                                            <img src="img/icon/close-icon.png" alt="">
                                        </th>  --}}
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">

                                                </div>
                                                <div class="media-body">
                                                    <h4>Product</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="red">Unit Price</p></td>
                                        <td>
                                            <div class="quantity">
                                                <h6>Quantity</h6>
                                            </div>
                                        </td>
                                        <td><p>Sub Total</p></td>
                                    </tr>
                                    @foreach ($items as $item)
                                    <tr>
                                        {{--  <th scope="row">
                                            <img src="{{ $item->image }}" alt="">
                                        </th>  --}}
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ $item->image }}" alt="" width="80">
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{ $item->product->name }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="red">{{ $item->unit_price }}</p></td>
                                        <td>
                                            <div class="quantity">
                                                <h6>{{ $item->quantity }}</h6>
                                            </div>
                                        </td>
                                        <td><p>{{ $item->sub_total }}</p></td>
                                    </tr>
                                    @endforeach

                                    {{--  <tr>
                                        <th scope="row">
                                        </th>
                                    </tr>
                                    <tr class="last">
                                        <th scope="row">
                                            <img src="img/icon/cart-icon.png" alt="">
                                        </th>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <h5>Cupon code</h5>
                                                </div>
                                                <div class="media-body">
                                                    <input type="text" placeholder="Apply cuopon">
                                                </div>
                                            </div>
                                        </td>
                                        <td><p class="red"></p></td>
                                        <td>
                                            <h3>update cart</h3>
                                        </td>
                                        <td></td>
                                    </tr>  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart_totals_area">
                        <h4>Order Totals</h4>
                        <div class="cart_t_list">
                            <div class="media">
                                <div class="d-flex">
                                    <h5>Subtotal</h5>
                                </div>
                                <div class="media-body">
                                    <h6>{{ $order->sub_total }}</h6>
                                </div>
                            </div>
                            {{--  <div class="media">
                                <div class="d-flex">
                                    <h5>Shipping</h5>
                                </div>
                                <div class="media-body">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model tex</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">

                                </div>
                                <div class="media-body">
                                    <select class="selectpicker">
                                        <option>Calculate Shipping</option>
                                        <option>Calculate Shipping</option>
                                        <option>Calculate Shipping</option>
                                    </select>
                                </div>
                            </div>  --}}
                        </div>
                        <div class="total_amount row m0 row_disable">
                            <div class="float-left">
                                Total
                            </div>
                            <div class="float-right">
                                {{ $order->total_payble }}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn subs_btn form-control">Download PDF</a>
                </div>
            </div>
        </div>
    </section>
    <!--================End Shopping Cart Area =================-->
@endsection
