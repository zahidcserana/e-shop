<footer class="footer_area">
    <div class="container">
        <div class="footer_widgets">
            <div class="row">
                <div class="col-lg-6 col-md-4 col-6">
                    <aside class="f_widget f_about_widget">
                        <a href="{{route('home_page')}}"><img src="{{asset('front/img/'.$store->front_logo)}}" alt=""></a>

                        <br>
                        <ul>
                            <li><a href="#"><i class="social_facebook"></i></a></li>
                            <li><a href="#"><i class="social_twitter"></i></a></li>
                            <li><a href="#"><i class="social_pinterest"></i></a></li>
                            <li><a href="#"><i class="social_instagram"></i></a></li>
                            <li><a href="#"><i class="social_youtube"></i></a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <aside class="f_widget link_widget f_info_widget">
                        <div class="f_w_title">
                            <h3>Information</h3>
                        </div>
                        <ul>
                            <li><a href="javascript::void()">About us</a></li>
                            <li><a href="javascript::void()">Terms & Conditions</a></li>
                            <li><a href="javascript::void()">Help Center</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <aside class="f_widget link_widget f_service_widget">
                        <div class="f_w_title">
                            <h3>Customer Service</h3>
                        </div>
                        <ul>
                            @foreach($categories as $row)
                                <li><a href="{{ route('category_products',$row->id) }}">{{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <h5>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | {{ $store->footer_front }} <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="{{ $store->dev_site }}" target="_blank">{{ $store->dev_company }}</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </h5>
        </div>
    </div>
</footer>
