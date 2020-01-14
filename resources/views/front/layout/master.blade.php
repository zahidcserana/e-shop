<?php

use App\Model\Category;
use App\Model\Cart;
$categories = DB::table('categories')->get();
$store = DB::table('stores')->find(1);
$cartItemNumber = Session::get('cart_id') ? DB::table('cart_items')->where('cart_id', Session::get('cart_id'))->count() : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('front/img/fav-icon.png')}}" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ env('TITLE') }}</title>

    <!-- Icon css link -->
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/vendors/line-icon/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/vendors/elegant-icon/style.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{asset('front/vendors/revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('front/vendors/revolution/css/layers.css')}}" rel="stylesheet">
    <link href="{{asset('front/vendors/revolution/css/navigation.css')}}" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="{{asset('front/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/vendors/bootstrap-selector/css/bootstrap-select.min.css')}}" rel="stylesheet">

    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .top_right li.cart a:before {
            content: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            text-align: center;
            color: #fff;
            font-family: "Poppins", sans-serif;
            font-size: 12px;
            position: absolute;
            right: 6px;
            bottom: 6px;
            background: #d91522;
            line-height: 20px;
        }
    </style>

</head>
<body>

<!--================Top Header Area =================-->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                {{--  <div class="top_header_left">
                    <div class="selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yu' data-image="{{asset('front/img/icon/home-1.png')}}"
                                    data-imagecss="flag yu" data-title="Bangladesh">Dhaka
                            </option>
                            <option value='yt' data-image="{{asset('front/img/icon/home-1.png')}}"
                                    data-imagecss="flag yt" data-title="English">Gazipur
                            </option>
                        </select>
                    </div>
                   <select class="selectpicker usd_select">
                        <option>USD</option>
                        <option>$</option>
                        <option>$</option>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                        <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="icon-magnifier"></i></button>
                                </span>
                    </div>
                </div>  --}}
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="#"><i class="fa fa-phone"></i> Call Us: <span>{{ env('PHONE') }}</span></a>
                    <a href="#"><i class="fa fa-envelope"></i> Email: <span>{{ env('EMAIL') }}</span></a>
                    <a href="{{route('home_page')}}"><img src="{{asset('front/img/'. $store->front_logo)}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="top_right_header">
                    <ul class="header_social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                    <ul class="top_right">
                      <li class="cart">
                        <a href="{{route('view_cart')}}">
                          <span id="cart_item_count" style="color: red;font-size: 17px;font-weight: bold">{{ $cartItemNumber }} &nbsp;</span>
                          <i class="icon-handbag icons"></i>
                        </a>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Top Header Area =================-->

<!--================Menu Area =================-->
@include('front.layout.home_menu')
<!--================End Menu Area =================-->
@yield('front_content')

<!--================Footer Area =================-->
@include('front.layout.footer')
<!--================End Footer Area =================-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- Rev slider js -->
<script src="{{asset('front/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('front/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<!-- Extra plugin css -->
<script src="{{asset('front/vendors/counterup/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('front/vendors/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/vendors/bootstrap-selector/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front/vendors/image-dropdown/jquery.dd.min.js')}}"></script>
<script src="{{asset('front/js/smoothscroll.js')}}"></script>
<script src="{{asset('front/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/vendors/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/vendors/vertical-slider/js/jQuery.verticalCarousel.js')}}"></script>
<script src="{{asset('front/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<script src="{{asset('front/js/theme.js')}}"></script>
<script src="{{asset('front/js/custom.js')}}"></script>
<script>
    $(document).ready(function () {
        $(document.body).delegate('#category_id', 'change', function () {
            var cat = $("#category_id").val();
            window.location = '/products/category/' + cat;
        });
        $(document.body).delegate('#limit_div', 'change', function () {
            var cat = $("#category_id").val();
            var limit = $("#limit_div").val();
            window.location = '/products/category/' + cat + '/' + limit;
        });
    });
</script>
@yield('header_js')
</body>
</html>
