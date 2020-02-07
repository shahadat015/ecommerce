@extends('layouts.website')
@push('css')
    <link rel="stylesheet" href="{{asset('contents/website/css/owl.carousel.min.css')}}">
@endpush
@section('content')
    <!-- start slider area -->
    @if($slider)
    <section id="slider_banar">
        <div class="banar_slider_active owl-carousel">
            @foreach($slider->slides as $slide)
            <div class="banar_slider_item" style="background: url({{ asset($slide->image) }}); background-repeat: no-repeat; background-position: center center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="banar_table">
                                <div class="banar_table_cell">
                                    <div class="banar_content">
                                        <h3>{{$slide->title ?? ""}}</h3>
                                        <p> {{$slide->subtitle ?? ""}} </p>
                                        @if($slide->call_to_action_text)
                                        <a href="{{$slide->call_to_action_url}}">{{$slide->call_to_action_text}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    <!-- start infobar top -->
    @include('website.partial.infobar')
    <!-- satrt summer collection -->

    @if(config('settings.product_carousel_1_enable'))
    <section id="summer_conllection">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="summer_title">
                        <h3>{{ config('settings.product_carousel_1_title') }}</h3>
                    </div>
                </div>
            </div>
            <div class="summer_slide_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="summer_slide_active owl-carousel">
                            @foreach($carousel_1_products as $carousel_1_product)
                            <div class="summer_slide_item">
                                <a href="{{ route('product', $carousel_1_product->slug) }}">
                                    <div class="summmer_image">
                                        <img height="170" src="{{ asset($carousel_1_product->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                        <div class="sumer_pro_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{ route('cart.add', $carousel_1_product->id) }}"><i class="icofont-shopping-cart"></i></a></li>
                                                <li><a href="{{ route('product', $carousel_1_product->slug)}}"><i class="icofont-eye-alt"></i></a></li>
                                                <li><a href="{{ route('customer.favorite', $carousel_1_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="summmer_item_content">
                                        <h4>{{str_limit($carousel_1_product->name, 20)}}</h4>
                                        <h3>Tk {{$carousel_1_product->price}}</h3>
                                        @include('website.partial.rating', ['rating' => $carousel_1_product->reviews()->avg('rating')])
                                        <a class="addtocart" href="{{ route('cart.add', $carousel_1_product->id) }}"><i class="icofont-shopping-cart"></i> Add To Cart</a>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- satrt feater product -->
    @if(config('settings.featured_product_enable'))
    <section id="feature_product">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="feature_product_title">
                        <h3>{{ config('settings.featured_products_title') }}</h3>
                    </div>
                </div>
            </div>
            <div class="featur_product_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="feater_product_image">
                                    <img class="img-fluid" src="{{ asset(config('settings.featured_product_image') ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                    <div class="feater_product_image_overlay_content">
                                        <h3>{{ str_limit(config('settings.featured_product_title'), 20) }}</h3>
                                        <p>{{ str_limit(config('settings.featured_product_subtitle'), 30) }} </p>
                                        <a href="{{ route('product', config('settings.featured_product_cta_url')) }}" target="{{ config('settings.featured_product_open_in') }}">{{ str_limit(config('settings.featured_product_cta_text'), 30) }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                                <div class="row">
                                    @foreach($featured_products as $key=>$featured_product)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 pl-0 text-center">
                                        <div class="feater_product_item">
                                            <a href="{ route('product', featured_product->slug)}}">
                                                <img class="img-fluid" src="{{asset($featured_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                            </a>
                                            <h4>{{str_limit($featured_product->name, 20)}}</h4>
                                            <h3>TK {{$featured_product->price}}</h3>
                                            @include('website.partial.rating', ['rating' => $featured_product->reviews()->avg('rating')])
                                            <a class="addtocart" href="{{ route('cart.add', $featured_product->id) }}"><i class="icofont-shopping-cart"></i></a>
                                            <a href="{ route(customer.favorite', $featured_product->id)}}"><i class="fas fa-heart"></i></a>
                                            <a href="{ route('product', $featured_product->slug)}}"><i class="fas fa-exchange-alt"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach($featured_products as $key=>$featured_product)
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="feater_product_item feater_product_item_2">
                                    <a href="{ route('product', featured_product->slug)}}">
                                        <img class="img-fluid" src="{{asset($featured_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                    </a>
                                    <a href="{ route('product', featured_product->slug)}}">
                                        <h4>{{str_limit($featured_product->name, 20)}}</h4>
                                    </a>
                                    <h3>Tk {{$featured_product->price}}</h3>
                                    @include('website.partial.rating', ['rating' => $featured_product->reviews()->avg('rating')])
                                    <a class="addtocart" href="{{ route('cart.add', $featured_product->id) }}"><i class="icofont-shopping-cart"></i></a>
                                    <a href="{ route(customer.favorite', $featured_product->id)}}"><i class="fas fa-heart"></i></a>
                                    <a href="{ route('product', featured_product->slug)}}"><i class="fas fa-exchange-alt"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- start feater image area page -->
    <section id="feater_image_content">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_image_content_img">
                        <a href="{{ url(config('settings.banner_section_1_cta_1_url')) }}">
                            <img class="img-fluid" src="{{ asset(config('settings.banner_section_1_image_1')) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_image_content_img">
                        <a href="{{ url(config('settings.banner_section_1_cta_2_url')) }}">
                            <img class="img-fluid" src="{{ asset(config('settings.banner_section_1_image_2')) }}" alt="">
                        </a>
                    </div>
                    <div class="feater_image_content_img">
                        <a href="{{ url(config('settings.banner_section_1_cta_3_url')) }}">
                            <img class="img-fluid" src="{{ asset(config('settings.banner_section_1_image_3')) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_image_content_img">
                        <a href="{{ url(config('settings.banner_section_1_cta_4_url')) }}">
                            <img class="img-fluid" src="{{ asset(config('settings.banner_section_1_image_4')) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start new arival -->
    @if(config('settings.enable_recent_products'))
    <section id="newarival">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="new_arival_title">
                        <h3>{{ config('settings.recent_products_title') }}</h3>
                    </div>
                </div>
            </div>
            <div class="new_arival_container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="new_arival_slider_active owl-carousel">
                                @foreach($recent_products as $recent_product)
                                <!-- single item -->
                                <div class="new_arival_item">
                                    <a href="{ route('product', $recent_product->slug)}}">
                                        <div class="new_arival_image">
                                            <img height="170" src="{{asset($recent_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                            <div class="new_arival_hover">
                                                <ul>
                                                    <li><a class="addtocart" href="{{ route('cart.add', $recent_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                    <li><a href="{{ route('customer.favorite', $recent_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                    <li><a href="{ route('product', $recent_product->id . '/' . $recent_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="new_arival_content">
                                            <a href="{ route('product', $recent_product->slug)}}">
                                                <h4>{{str_limit($recent_product->name, 20)}}</h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="new_arival_content_price">
                                                        <h3>Tk {{$recent_product->price}}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="new_arival_content_reating">
                                                        @include('website.partial.rating', ['rating' => $recent_product->reviews()->avg('rating')])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(config('settings.product_carousel_2_enable'))
    <!-- start tshirt area -->
    <section id="teshirt">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="teshirt_title">
                        <h3>{{ config('settings.product_carousel_2_title') }}</h3>
                    </div>
                </div>
            </div>
            <div class="teshirt_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="teshirt_slide_active owl-carousel">
                            <!--single item-->
                            @foreach($carousel_2_products as $carousel_2_product)
                            <div class="teshirt_slide_item">
                                <a href="{ route('product', $carousel_2_product->slug)}}">
                                    <div class="teshirt_slide_image">
                                        <img height="170" src="{{ asset($carousel_2_product->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                        <div class="teshirt_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{ route('cart.add', $carousel_2_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                <li><a href="{{ route('customer.favorite', $carousel_2_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                <li><a href="{ route('product', $carousel_2_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="teshirt_slide_cotent">
                                        <a href="{ route('product', $carousel_2_product->slug)}}">
                                            <h4>{{str_limit($carousel_2_product->name)}}</h4>
                                        </a>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="teshirt_slide_cotent_price">
                                                    <h3>Tk {{$carousel_2_product->price}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="teshirt_slide_cotent_rating">
                                                    @include('website.partial.rating', ['rating' => $carousel_2_product->reviews()->avg('rating')])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--start feater product 2-->
    <section id="feater_product_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feater_product_2_item_img">
                                <a href="{{ url(config('settings.banner_section_2_cta_1_url')) }}">
                                    <img class="img-fluid" src="{{ asset(config('settings.banner_section_2_image_1')) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feater_product_2_item_img">
                                <a href="{{ url(config('settings.banner_section_2_cta_2_url')) }}">
                                    <img class="img-fluid" src="{{ asset(config('settings.banner_section_2_image_2')) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="feater_product_2_item_img">
                                <a href="{{ url(config('settings.banner_section_2_cta_3_url')) }}">
                                    <img class="img-fluid" src="{{ asset(config('settings.banner_section_2_image_3')) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_product_2_item_img">
                        <a href="{{ url(config('settings.banner_section_2_cta_4_url')) }}">
                            <img class="img-fluid" src="{{ asset(config('settings.banner_section_2_image_4')) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="shop_by_brand_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shope_barnd_title">
                            <h3>Shop By Brand</h3>
                        </div>
                    </div>
                </div>
                <div class="shope_brand_slide_active owl-carousel">
                    @foreach($brands as $brand)
                    <div class="shop_brand_slide_item">
                        <a href="{{ route('product.brand', $brand->slug) }}">
                            <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> 
    @if(config('settings.product_carousel_3_enable'))
    <!--start Gadget-->
    <section id="gadget">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="gadget_title">
                        <h3>{{ config('settings.product_carousel_3_title') }}</h3>
                    </div>
                </div>
            </div>
            <div class="gadget_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="gadegt_slider_active owl-carousel">
                            <!-- single item -->
                            @foreach($carousel_3_products as $carousel_3_product)
                            <div class="gadget_slid_item">
                                <a href="{ route('product', $carousel_3_product->slug)}}">
                                    <div class="gadget_slid_image">
                                        <img height="170" src="{{ asset($carousel_3_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                        <div class="gadget_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{ route('cart.add', $carousel_3_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                <li><a href="{{ route('customer.favorite', $carousel_3_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                <li><a href="{ route('product', $carousel_3_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                                <div class="gadget_slid_content">
                                    <a href="{ route('product', $carousel_3_product->slug)}}">
                                        <h4>{{str_limit($carousel_3_product->name, 20)}}</h4>
                                    </a>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="gadget_slid_content_price">
                                                <h3>Tk {{$carousel_3_product->price}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="gadget_slid_content_reating">
                                                @include('website.partial.rating', ['rating' => $carousel_3_product->reviews()->avg('rating')])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- start tab product -->
    @if(config('settings.enable_products_tabs'))
    <section id="tab_product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="product_tab_link active" data-toggle="tab" href="#{{ str_slug(config('settings.product_tab_1_title')) }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ config('settings.product_tab_1_title') }}</a>
                            <a class="product_tab_link" data-toggle="tab" href="#{{ str_slug(config('settings.product_tab_2_title')) }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ config('settings.product_tab_2_title') }}</a>
                            <a class="product_tab_link" data-toggle="tab" href="#{{ str_slug(config('settings.product_tab_3_title')) }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ config('settings.product_tab_3_title') }}</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="{{ str_slug(config('settings.product_tab_1_title')) }}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                @foreach($tab_1_products as $tab_1_product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <a href="{ route('product', $tab_1_product->slug)}}">
                                        <div class="tab_product_item text-center">
                                            <div class="tab_product_image">
                                                <img class="img-fluid" src="{{asset($tab_1_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                                <div class="product_tab_hover">
                                                    <ul>
                                                        <li><a class="addtocart" href="{{ route('cart.add', $tab_1_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                        <li><a href="{{ route('customer.favorite', $tab_1_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                        <li><a href="{{url('tab_1_product/' . $tab_1_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab_product_contnt">
                                                @include('website.partial.rating', ['rating' => $tab_1_product->reviews()->avg('rating')])
                                                <a href="{{url('tab_1_product/' . $tab_1_product->slug)}}">
                                                    <h4>{{str_limit($tab_1_product->name, 20)}}</h4>
                                                </a>
                                                <h3>Tk {{$tab_1_product->price}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="{{ str_slug(config('settings.product_tab_2_title')) }}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                @foreach($tab_2_products as $tab_2_product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <a href="{ route('product', $tab_2_product->slug)}}">
                                        <div class="tab_product_item text-center">
                                            <div class="tab_product_image">
                                                <img class="img-fluid" src="{{asset($tab_2_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                                <div class="product_tab_hover">
                                                    <ul>
                                                        <li><a class="addtocart" href="{{ route('cart.add', $tab_2_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                        <li><a href="{{ route('customer.favorite', $tab_2_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                        <li><a href="{{url('tab_2_product/' . $tab_2_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab_product_contnt">
                                                @include('website.partial.rating', ['rating' => $tab_2_product->reviews()->avg('rating')])
                                                <a href="{{url('tab_2_product/' . $tab_2_product->slug)}}">
                                                    <h4>{{str_limit($tab_2_product->name, 20)}}</h4>
                                                </a>
                                                <h3>Tk {{$tab_2_product->price}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="{{ str_slug(config('settings.product_tab_3_title')) }}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                @foreach($tab_3_products as $tab_3_product)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                    <a href="{ route('product', $tab_3_product->slug)}}">
                                        <div class="tab_product_item text-center">
                                            <div class="tab_product_image">
                                                <img class="img-fluid" src="{{asset($tab_3_product->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                                <div class="product_tab_hover">
                                                    <ul>
                                                        <li><a class="addtocart" href="{{ route('cart.add', $tab_3_product->id) }}"><i class="icofont-ui-cart"></i></a></li>
                                                        <li><a href="{{ route('customer.favorite', $tab_3_product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                        <li><a href="{{url('tab_3_product/' . $tab_3_product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab_product_contnt">
                                                @include('website.partial.rating', ['rating' => $tab_3_product->reviews()->avg('rating')])
                                                <a href="{{url('tab_3_product/' . $tab_3_product->slug)}}">
                                                    <h4>{{str_limit($tab_3_product->name, 20)}}</h4>
                                                </a>
                                                <h3>Tk {{$tab_3_product->price}}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection
@push('js')
    <script src="{{asset('contents/website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('contents/website/js/owl.carousel.active.js')}}"></script>
    <script>
        $(function () {
            $('.banar_slider_active').owlCarousel({
                loop: true,
                margin: 0,
                navText: [
                    "<i class='icofont-long-arrow-left'></i>", 
                    "<i class='icofont-long-arrow-right'></i>"
                ],
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                mouseDrag: false,
                nav: @if($slider && $slider->arrows) true @else false @endif,
                autoplay: @if($slider && $slider->autoplay) true @else false @endif,
                autoplayTimeout: @if($slider) @php echo $slider->autoplay_speed @endphp @endif,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>
@endpush
