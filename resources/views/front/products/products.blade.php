@extends('front.layout.product')
@section('header_js')
    @parent
    <script>
        function addToCart(id,price) {
            $.ajax({
                url: "{{ route('add_to_cart') }}",
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", product_id: id,price:price},
                success: function (response) {
                    var response = $.parseJSON(response);
                    if (response.success) {
                        $("#cart-msg").show();
                    }
                }
            });
        }
    </script>
    <style>
        #cart-msg {
            margin-bottom: 5px;
            width: 30%;
            text-align: center;
            font-size: 18px;
            display: none;
        }
    </style>
@endsection
@section('front_content')

    <!--================Categories Product Area =================-->
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-9 float-md-right">
                        <div class="showing_fillter">
                            <div class="alert-success" id="cart-msg">Successfully added</div>
                            <div class="row m0">
                                <div class="first_fillter">
                                    <h4>Showing {{$from}} to {{$to}} of {{$total}} total</h4>
                                </div>
                                <div class="secand_fillter">
                                    <h4>SORT BY :</h4>
                                    <select class="selectpicker">
                                        <option>Name</option>
                                        <option>Name 2</option>
                                        <option>Name 3</option>
                                    </select>
                                </div>
                                <div class="third_fillter">
                                    <h4>Show : </h4>
                                    <select class="selectpicker" id="limit_div">
                                        <option {{$limit==9?'selected':""}} value="9">09</option>
                                        <option {{$limit==15?'selected':""}} value="15">15</option>
                                        <option {{$limit==21?'selected':""}} value="21">21</option>
                                        <option {{$limit==27?'selected':""}} value="27">27</option>
                                    </select>
                                </div>
                                <div class="four_fillter">
                                    <h4>View</h4>
                                    <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                    <a href="#"><i class="icon_grid-3x3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <a href="{{route('view_product',$product->id)}}">
                                                    <img src="{{asset('image/products/'.$product->image)}}" alt="">
                                                </a>
                                                <h5 class="new">New</h5>
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a>
                                                    </li>
                                                    <li><a class="add_cart_btn" onclick="addToCart('{{$product->id}}','{{$product->price}}')"
                                                           href="javascript:void(0);">Add ToCart</a></li>
                                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a>
                                                    </li>
                                                </ul>
                                                <h4>{{$product->name}}</h4>
                                                <h5>
                                                    <del>{{$product->price + 10}}</del> {{$product->price}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--<div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-2.jpg" alt="">
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Summer Dress</h4>
                                            <h5>$45.50</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-3.jpg" alt="">
                                            <h5 class="new">New</h5>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Nike Shoes</h4>
                                            <h5><del>$130</del> $110</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-4.jpg" alt="">
                                            <h5 class="new">New</h5>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>High Heel</h4>
                                            <h5><del>$130.50</del>  $110</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-5.jpg" alt="">
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Fossil Watch</h4>
                                            <h5>$250.50</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-6.jpg" alt="">
                                            <h5 class="new">New</h5>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Ricky Shirt</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-7.jpg" alt="">
                                            <h5 class="new">New</h5>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Nike Max Air Vapor Power</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-8.jpg" alt="">
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>Nike Shoes</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img src="img/product/c-product-9.jpg" alt="">
                                            <h5 class="sale">Sale</h5>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>

                                            <h4>Summer Dress</h4>
                                            <h5>$110</h5>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                    {{ $products->links() }}
                                    {{--
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                    --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 float-md-right">
                        <div class="categories_sidebar">
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Men’s Fashion
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Women’s Fashion
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Phone & Accessories
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Electronic Appliance
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">Computer & Networking
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">TV, Audiio & Gaming
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">Office Supplies
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">All Categories
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="l_widgest l_fillter_widget">
                                <div class="l_w_title">
                                    <h3>Filter section</h3>
                                </div>
                                <div id="slider-range" class="ui_slider"></div>
                                <label for="amount">Price:</label>
                                <input type="text" id="amount" readonly>
                            </aside>
                            <aside class="l_widgest l_color_widget">
                                <div class="l_w_title">
                                    <h3>Color</h3>
                                </div>
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </aside>
                            <aside class="l_widgest l_menufacture_widget">
                                <div class="l_w_title">
                                    <h3>Manufacturer</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Nigel Cabourn.</a></li>
                                    <li><a href="#">Cacharel.</a></li>
                                    <li><a href="#">Calibre (Menswear)</a></li>
                                    <li><a href="#">Calvin Klein.</a></li>
                                    <li><a href="#">Camilla and Marc</a></li>
                                </ul>
                            </aside>
                            <aside class="l_widgest l_feature_widget">
                                <div class="l_w_title">
                                    <h3>Featured Products</h3>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/featured-product/f-p-5.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Jeans with <br/> Frayed Hems</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/featured-product/f-p-6.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Crysp Denim<br/>Montana</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

