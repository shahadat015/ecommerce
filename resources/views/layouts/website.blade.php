<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('keywords', config('settings.storefront_meta_keywords'))">
    <meta name="description" content="@yield('description', config('settings.storefront_meta_description'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('settings.store_name'))</title>
    <link rel="icon" href="{{ asset( asset(config('settings.storefront_favicon')) ) }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/bootstrap.min.css') }}">
    @stack('css')
    <link rel="stylesheet" href="{{ asset('contents/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('contents/website/css/toastr.min.css') }}">
    <script src="{{ asset('contents/website/js/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <div class="loading">
        <img src="{{ asset('contents/website/img/lg.curve-bars-loading-indicator.gif') }}" alt="">
    </div>
    <!--strat header top area-->
    <header id="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="header_top_info_text">
                        <p>{{ config('settings.store_tagline') }}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="header_top_info text-right">
                        <ul>
                            <li><a href="tel:{{ config('settings.store_phone') }}"><i class="fas fa-phone-volume"></i> {{ config('settings.store_phone') }} </a></li>
                            <li><a href="mailto:{{ config('settings.store_email') }}"><i class="fas fa-envelope"></i> {{ config('settings.store_email') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--satrt logo container-->
    <section id="banar_top_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    <div class="main_logo">
                        <a href="{{ route('home') }}">
                            @if(config('settings.storefront_logo'))
                                <img class="img-fluid" src="{{ asset(config('settings.storefront_logo')) }}" alt="logo">
                            @else
                                <h5>{{ config('settings.store_name') }}</h5>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                    <div class="serach_bar">
                        <form id="search" action="{{ route('search') }}" method="get">
                            <div class="search_form_box">
                                <input class="search" type="text" name="query" placeholder="Search for product" value="{{ request('query') }}" required>
                                <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="typed-search-box d-none">
                        <div class="search-preloader d-none">
                            <div class="loader"><div></div><div></div><div></div></div>
                        </div>
                        <div class="product"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                            <div class="user_login">
                                @auth('customer')
                                @php $customer = auth('customer')->user(); @endphp
                                <ul>
                                    <li><a href="{{ route('customer.dashboard') }}"><i class="far fa-user"></i> {{ $customer->name }}</a>
                                        <ul>
                                            <li class="{{ request()->is('customer/account') ? 'active' : '' }}">
                                                <a href="{{ route('customer.account') }}"><i class="far fa-user"></i> My Profile</a>
                                           </li>
                                            <li class="{{ request()->is('customer/orders') ? 'active' : '' }}">
                                                <a href="{{ route('customer.orders') }}"><i class="fas fa-shopping-bag"></i> My Orders</a>
                                           </li>
                                           <li class="{{ request()->is('customer/favorites') ? 'active' : '' }}">
                                                <a href="{{ route('customer.favorites') }}"><i class="fas fa-heart"></i> Wishlist</a>
                                           </li>
                                            <li>
                                                <a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-unlock"></i> Logout</a>
                                           </li>
                                        </ul>
                                    </li>
                                </ul>
                                @else
                                <ul>
                                    <li><a href="{{ route('customer.login') }}"><i class="fas fa-lock"></i> Login</a></li>
                                    <li><a href="{{ route('customer.register') }}"><i class="far fa-user"></i> Sign Up</a></li>

                                </ul>
                                @endauth
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 ptl ptr">
                            <div class="user_cart">
                                <div class="user_cart_box">
                                    <p>Cart-<span>Tk {{ Cart::total() }}</span></p>
                                    <span class="cart_bag"><i class="fas fa-shopping-bag"></i></span>
                                    <h6>{{ Cart::content()->count() }}</h6>
                                </div>
                            </div>
                            <div class="cart_togle_content">
                                <div class="row mini-cart">
                                    @forelse(Cart::content() as $cartItem)
                                    <div class="mini_cart_item">
                                        <div class="row">
                                            <div class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="mini_cart_image">
                                                    <img class="img-fluid" src="{{ asset($cartItem->options->image) }}" alt="cart">
                                                </div>
                                            </div>
                                            <div class="col-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                                <div class="mini_cart_content">
                                                    <h4>{{ str_limit($cartItem->name, 20) }}</h4>
                                                    <p>{{ $cartItem->qty}} × {{ $cartItem->price }}</p>
                                                    <a class="removefromcart" href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="far fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12 text-center">
                                        <p>There are no items in this cart</p>
                                    </div>
                                    @endforelse
                                    @if(Cart::count() > 0)
                                    <div class="min_cart_button_bottom text-center">
                                        <a href="{{ route('cart') }}">View Cart</a>
                                        <a href="{{ route('checkout') }}" class="min_cart_btn_sp">Check Out</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start main menu area -->
    @if($primaryMenu && $primaryMenu->is_active)
    <section id="main_menu">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="menu_item_container pr">
                        @include('website.partial.mega-menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- start mobile menu start here -->
    <section id="mobile_menu_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4 col-sm-4">
                    <div class="mobile_menu_top_logo">
                        <a href="{{ route('home') }}">
                            <img class="img-fluid" src="{{ asset(config('settings.storefront_logo')) }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-8 col-sm-8">
                    <div class="mobile_menu_top_search">
                        <form action="{{ url('search') }}" method="get">
                            <div class="mobile_menu_top_search_box">
                                <input type="text" name="query" placeholder="Search for product" value="{{ request('query') }}" required>
                                <button type="submit"><i class="fas fa-search"></i></button>
                                @error('query')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start mobile menu menu -->
    <section id="mobile_menu_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2 col-sm-1">
                    <div class="mobile_menu_menu_icon">
                        <i class="fas fa-bars show_icon"></i>
                        <i class="fas fa-times close_icon"></i>
                    </div>
                </div>
                <div class="col-10 col-sm-7">
                    <div class="mobile_menu_menu_user">

                        <div class="user_login">
                            @auth('customer')
                            <ul>
                                <li><a href="{{ route('customer.dashboard') }}"><i class="far fa-user"></i> {{ str_limit($customer->name, 8) }}</a>
                                    <ul>
                                        <li class="{{ request()->is('customer/account') ? 'active' : '' }}">
                                            <a href="{{ route('customer.account') }}"><i class="far fa-user"></i> My Profile</a>
                                       </li>
                                        <li class="{{ request()->is('customer/orders') ? 'active' : '' }}">
                                            <a href="{{ route('customer.orders') }}"><i class="fas fa-shopping-bag"></i> My Orders</a>
                                       </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-unlock"></i> Logout</a>
                               </li>
                            </ul>
                            @else
                            <ul>
                                <li><a href="{{ route('customer.login') }}"><i class="fas fa-lock"></i> Login</a></li>
                                <li><a href="{{ route('customer.register') }}"><i class="far fa-user"></i> Sign Up</a></li>
                            </ul>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="user_cart">
                        <div class="user_cart_box">
                            <p>Cart- <span>{{ Cart::total() }}</span></p>
                            <span class="cart_bag"><i class="fas fa-shopping-bag"></i></span>
                            <h6>{{ Cart::count() }}</h6>
                        </div>
                    </div>
                    <div class="cart_togle_content">
                        <div class="row">
                            @forelse(Cart::content() as $cartItem)
                            <div class="mini_cart_item">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="mini_cart_image">
                                            <img class="img-fluid" src="{{ asset($cartItem->options->image) }}" alt="cart">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                        <div class="mini_cart_content">
                                            <h4>{{ str_limit($cartItem->name, 30) }}</h4>
                                            <p>{{ $cartItem->qty}} × {{ $cartItem->price}}</p>
                                            <a class="removetocart" href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12 text-center">
                                <p>There are no items in this cart</p>
                            </div>
                            @endforelse
                            @if(Cart::count() > 0)
                            <div class="min_cart_button_bottom text-center">
                                <a href="{{ route('cart') }}">View Cart</a>
                                <a href="{{ route('checkout') }}" class="min_cart_btn_sp">Check Out</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($primaryMenu && $primaryMenu->is_active)
        <div id="moble_menu_menu_content">
            <div class="category_menu_mobile_content_menu">
                <aside class="sidebar">
                    @include('website.partial.mobile-menu')
                </aside>
            </div>
        </div>
        @endif
    </section>
    
    @yield('content')

    <!-- satrt news later area -->
    <section id="newslater">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="newslater_container text-center">
                        <h3>Sign up to newsletter</h3>
                        <p>Instant Sign Up. Cancel Anytime. No Credit Card Required</p>
                        <div class="news_later_form">
                            <form action="{{ route('subscribe') }}" method="post" id="subscriber-form">
                                @csrf

                                <div class="news_later_input_container">
                                    <input name="email_address" type="email" placeholder="Enter your email" required>
                                    <button class="btn-subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start footert top -->
    <section id="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_about">
                        <a href="{{ route('home') }}">
                            @if(config('settings.storefront_logo'))
                                <img class="img-fluid" src="{{ asset(config('settings.storefront_logo')) }}" alt="">
                            @else
                                <h5>{{ config('settings.store_name') }}</h5>
                            @endif
                        </a>
                        <p>{{ config('settings.store_tagline') }}. </p>
                        <ul>
                            @php
                                $facebook = config('settings.storefront_facebook_link');
                                $twitter = config('settings.storefront_twitter_link');
                                $instagram = config('settings.storefront_instagram_link');
                                $linkedin = config('settings.storefront_linkedin_link');
                                $google = config('settings.storefront_google_link');
                                $youtube = config('settings.storefront_youtube_link');
                            @endphp
                            @if($facebook)
                            <li><a target="_blank" href="{{ $facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($twitter)
                            <li><a target="_blank" href="{{ $twitter }}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if($instagram)
                            <li><a target="_blank" href="{{ $instagram }}"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if($linkedin)
                            <li><a target="_blank" href="{{ $linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                            @endif
                            @if($google)
                            <li><a target="_blank" href="{{ $google }}"><i class="fab fa-google-plus"></i></a></li>
                            @endif
                            @if($youtube)
                            <li><a target="_blank" href="{{ $youtube }}"><i class="fab fa-youtube"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="row">
                        @if($popularCategory)
                            @php
                                $popularCategories = $popularCategory->menuItems()->where('is_root',0)->get();
                            @endphp
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer_link">
                                <h3>CATEGORIES</h3>
                                <ul>
                                    @foreach($popularCategories as $popularCategory)
                                        <li><a href="{{ $popularCategory->url }}">{{ $popularCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer_link">
                                <h3>MY ACCOUNT</h3>
                                <ul>
                                    <li><a href="{{ route('customer.orders') }}">Orders</a></li>
                                    <li><a href="#">Compare</a></li>
                                    <li><a href="{{ route('customer.favorites') }}">Wishlist</a></li>
                                    <li><a href="{{ route('customer.login') }}">Log In</a></li>
                                    <li><a href="{{ route('customer.register') }}">Register</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="footer_link">
                                <h3>CONTACTS</h3>
                                <div class="conatct_info_footer">
                                    <p><span>Address:</span> {{ config('settings.store_address') }}</p>
                                    <p><span>Phone:</span> <a href="tel:{{ config('settings.store_phone') }}"> {{ config('settings.store_phone') }}</a></p>
                                    <p><span>Hours:</span> 7 Days a week from 10 am to 6 pm</p>
                                    <p><span>Email</span> <a href="mailto:{{ config('settings.store_email') }}"> {{ config('settings.store_email') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span><i class="icofont-long-arrow-up scrolltop"></i></span>
    </section>
    <!-- satrt footer copyright -->
    <footer id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="footer_copy_content text-center">
                        <p>&copy; {!! config('settings.storefront_copyright_text') !!} </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <form id="logout-form" class="d-none" action="{{ route('customer.logout') }}" method="POST">
        @csrf
    </form>
    <!-- ========== this is main js link ========== -->
    <script src="{{ asset('contents/website/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('contents/website/js/toastr.min.js') }}"></script>
    <script src="{{ asset('contents/website/js/popper.min.js') }}"></script>
    <script src="{{ asset('contents/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('contents/website/js/metisMenu.min.js') }}"></script>
    @stack('js')
    <script src="{{ asset('contents/website/js/custom.js') }}"></script>
    <script src="{{ asset('contents/website/js/ajax.js') }}"></script>
</body>

</html>
