
@extends('front.layout.master')

@section('front_content')

    <!--================Product Details Area =================-->
    <section class="product_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product_details_slider">
                        <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                            <ul>
                            @if(sizeof($images) > 0)
                                <!-- SLIDE  -->
                                    <li data-index="rs-137221490" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[0]->large)}}"
                                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500"
                                        data-fsslotamount="7" data-saveperformance="off" data-title="Ishtar X Tussilago"
                                        data-param1="25/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[0]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                            @endif
                            @if(sizeof($images) > 1)
                                <!-- SLIDE  -->
                                    <li data-index="rs-136228343" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[1]->large)}}"
                                        data-rotate="0" data-saveperformance="off" data-title="Los Angeles"
                                        data-param1="13/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[1]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                            @endif
                            @if(sizeof($images) > 2)
                                <!-- SLIDE  -->
                                    <li data-index="rs-135960434" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[2]->large)}}"
                                        data-rotate="0" data-saveperformance="off" data-title="The Colors of Feelings"
                                        data-param1="11/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[2]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->


                                    </li>
                            @endif
                            @if(sizeof($images) > 3)
                                <!-- SLIDE  -->
                                    <li data-index="rs-134008155" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[3]->large)}}"
                                        data-rotate="0" data-saveperformance="off" data-title="Powerful Iceland"
                                        data-param1="20/07/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[3]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                    </li>
                            @endif
                            @if(sizeof($images) > 4)
                                <!-- SLIDE  -->
                                    <li data-index="rs-134208766" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[4]->large)}}"
                                        data-rotate="0" data-saveperformance="off"
                                        data-title="Creativity Room - New Fubiz 2015" data-param1="22/07/2015"
                                        data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[4]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                    </li>
                            @endif
                            @if(sizeof($images) > 5)
                                <!-- SLIDE  -->
                                    <li data-index="rs-134208766" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[5]->large)}}"
                                        data-rotate="0" data-saveperformance="off"
                                        data-title="Creativity Room - New Fubiz 2015" data-param1="22/07/2015"
                                        data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[5]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                    </li>
                            @endif
                            @if(sizeof($images) > 6)
                                <!-- SLIDE  -->
                                    <li data-index="rs-132884121" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[6]->large)}}"
                                        data-rotate="0" data-saveperformance="off"
                                        data-title="Animated GIFS - New Fubiz 2015" data-param1="07/07/2015"
                                        data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[6]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                    </li>
                            @endif
                            @if(sizeof($images) > 7)
                                <!-- SLIDE  -->
                                    <li data-index="rs-130740141" data-transition="scaledownfrombottom"
                                        data-slotamount="7"
                                        data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                        data-masterspeed="1500"
                                        data-thumb="{{asset('image/products/'.$images[7]->large)}}"
                                        data-rotate="0" data-saveperformance="off"
                                        data-title="Naive New Beaters - Run Away"
                                        data-param1="15/06/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('image/products/'.$images[7]->large)}}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat"
                                             data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                            @endif
                            <!-- SLIDE  -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product_details_text">
                        <h3>{{$product->name}}</h3>
                       {{-- <ul class="p_rating">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="add_review">
                            <a href="#">5 Reviews</a>
                            <a href="#">Add your review</a>
                        </div>--}}
                        <h6>Available In <span>Stock</span></h6>
                        <h4>${{$product->price}}</h4>
                        <p>{{$product->description}}</p>
                        <div class="p_color">
                            <h4 class="p_d_title">{{ $product->sub_category->name }} ->  {{ $product->category->name }}<span></span></h4>
                        </div>
                        <div class="quantity">
                            <div class="custom">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                <input type="text" name="qty" id="sst" maxlength="12" value="01" title="Quantity:"
                                       class="input-text qty">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="icon_plus"></i></button>
                            </div>
                            <a class="add_cart_btn" href="#">add to cart</a>
                        </div>
                        <div class="shareing_icon">
                            <h5>share :</h5>
                            <ul>
                                <li><a href="#"><i class="social_facebook"></i></a></li>
                                <li><a href="#"><i class="social_twitter"></i></a></li>
                                <li><a href="#"><i class="social_pinterest"></i></a></li>
                                <li><a href="#"><i class="social_instagram"></i></a></li>
                                <li><a href="#"><i class="social_youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <nav class="tab_menu">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Product Description</a>
                    <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Reviews (1)</a> -->
                    <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Tags</a> -->
                    <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                       aria-controls="nav-info" aria-selected="false">additional information</a>
                    <a class="nav-item nav-link" id="nav-gur-tab" data-toggle="tab" href="#nav-gur" role="tab"
                       aria-controls="nav-gur" aria-selected="false">gurantees</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p>{{$product->description}}</p>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h4>Rocky Ahmed</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                </div>
                <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                </div>
                <div class="tab-pane fade" id="nav-gur" role="tabpanel" aria-labelledby="nav-gur-tab">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================End Related Product Area =================-->
    <section class="related_product_area">
        <div class="container">
            <div class="related_product_inner">
                <h2 class="single_c_title">Related Product</h2>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img class="img-fluid" src="img/product/related-product/r-product-1.jpg" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4>Run Tracksuit</h4>
                                <h5>$85.50</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img class="img-fluid" src="img/product/related-product/r-product-2.jpg" alt="">
                                <h5 class="new">New</h5>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4>Nike Men Trouser</h4>
                                <h5>
                                    <del>$130.50</del>
                                    $110
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img class="img-fluid" src="img/product/related-product/r-product-3.jpg" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4>Nike Track Pants</h4>
                                <h5>$250.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img class="img-fluid" src="img/product/related-product/r-product-4.jpg" alt="">
                                <h5 class="sale">Sale</h5>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4>Therma Pants</h4>
                                <h5>$45.50</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example" class="pagination_area">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right"
                                                                                    aria-hidden="true"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!--================End Related Product Area =================-->

@endsection
