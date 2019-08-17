@extends('front.layout.master')
@section('header_js')
    @parent
    <script>
        function increase(itemId) {
            var result = document.getElementById('sst_' + itemId);
            var sst = result.value;
            if (!isNaN(sst)) {
                result.value++;
                $.ajax({
                    url: "{{ route('update_cart') }}",
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", item_id: itemId, increment: true},
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            $("#price_" + itemId).text(data.data.price);
                        }
                    }
                });
            }
        }

        function decrease(itemId) {
            var result = document.getElementById('sst_' + itemId);
            var sst = result.value;
            if (!isNaN(sst) && sst > 1) {
                result.value--;
                $.ajax({
                    url: "{{ route('update_cart') }}",
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", item_id: itemId, increment: false},
                    success: function (response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            $("#price_" + itemId).text(data.data.price);
                        }
                    }
                });
            }
        }
    </script>
@endsection
@section('front_content')

<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>checkout register</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="checkout.html">Checkout Register</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->

     <!--================Register Area =================-->
     <section class="register_area p_100">
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing_details">
                                <h2 class="reg_title">Billing Detail</h2>
                                <form method="POST" action="{{ route('add_order') }}" aria-label="{{ __('Register') }}" class="billing_inner row">
                                @csrf
                                    {{--  <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cun">Country <span>*</span></label>
                                            <select class="selectpicker" id="cun">
                                                <option>United State America (USA)</option>
                                                <option>Bangladesh (BAN)</option>
                                                <option>United State America (USA)</option>
                                            </select>
                                        </div>
                                    </div>  --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name"> Name <span>*</span></label>
                                            <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="">
                                        </div>
                                    </div>
                                    {{--  <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="last">Last Name <span>*</span></label>
                                            <input type="text" class="form-control" id="last" aria-describedby="last">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="cname">Company Name <span>*</span></label>
                                            <select class="selectpicker" id="cname">
                                                <option>United State America (USA)</option>
                                                <option>Bangladesh (BAN)</option>
                                                <option>United State America (USA)</option>
                                            </select>
                                        </div>
                                    </div>  --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Address <span>*</span></label>
                                            <input type="text" class="form-control" name="address" aria-describedby="address">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">Email <span>*</span></label>
                                            <input type="email" class="form-control" name="email" aria-describedby="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Mobile <span>*</span></label>
                                            <input type="text" class="form-control" name="mobile" aria-describedby="mobile">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="order">Order Notes <span>*</span></label>
                                            <textarea class="form-control" id="order" name="note" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" value="submit" class="btn subs_btn form-control">place order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="order_box_price">
                                <h2 class="reg_title">Your Order</h2>
                                <div class="payment_list">
                                    <div class="price_single_cost">
                                    @foreach($items as $item)
                                    <h5>{{$item->product->name}} <span>${{$item->sub_total}}</span></h5>
                                    @endforeach

                                        <h4>Cart Subtotal <span>${{$cart->sub_total}}</span></h4>
                                        <h3><span class="normal_text">Order Totals</span> <span>${{$cart->total_payble}}</span></h3>
                                    </div>
                                    <div id="accordion" role="tablist" class="price_method">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">
                                                    direct bank transfer
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                                                    cheque payment
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                                                    cash on delivery
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingfour">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapsefour" role="button" aria-expanded="false" aria-controls="collapsefour">
                                                    paypal
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapsefour" class="collapse" role="tabpanel" aria-labelledby="headingfour" data-parent="#accordion">
                                                <div class="card-body">
                                                    Lorem Ipsum is simply dummy text of the print-ing and typesetting industry. Lorem Ipsum has been the industry's.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Register Area =================-->

@endsection
