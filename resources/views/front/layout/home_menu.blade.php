<header class="shop_header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{asset('front/img/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav categories">
                    <li class="nav-item">
                        <select class="selectpicker" id="category_id" name="category_id">
                            <option value="">Category</option>
                            @foreach($categories as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown submenu active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home Simple</a></li>
                            <li class="nav-item"><a class="nav-link" href="home-carousel.html">Home Carousel</a></li>
                            <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Home Full Width</a></li>
                            <li class="nav-item"><a class="nav-link" href="home-parallax.html">Home Parallax</a></li>
                            <li class="nav-item"><a class="nav-link" href="home-sidebar.html">Home Boxed</a></li>
                            <li class="nav-item"><a class="nav-link" href="home-fixed-menu.html">Home Fixed</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="compare.html">Compare</a></li>
                            <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Method</a></li>
                            <li class="nav-item"><a class="nav-link" href="register.html">Checkout Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="track.html">Track</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-2column.html">Prodcut No Sidebar</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-3column.html">Prodcut Two Column</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-4column.html">Product Grid</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories-left-sidebar.html">Categories Left Sidebar</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories-right-sidebar.html">Categories Right Sidebar</a></li>
                            <li class="nav-item"><a class="nav-link" href="categories-grid-left-sidebar.html">Categories Grid Sidebar</a></li>
                            <li class="nav-item"><a class="nav-link" href="product-details.html">Prodcut Details 01</a></li>
                            <li class="nav-item"><a class="nav-link" href="product-details2.html">Prodcut Details 02</a></li>
                            <li class="nav-item"><a class="nav-link" href="product-details3.html">Prodcut Details 03</a></li>
                            <li class="nav-item"><a class="nav-link" href="shopping-cart.html">Shopping Cart 01</a></li>
                            <li class="nav-item"><a class="nav-link" href="shopping-cart2.html">Shopping Cart 02</a></li>
                            <li class="nav-item"><a class="nav-link" href="empty-cart.html">Empty Cart</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">lookbook</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>