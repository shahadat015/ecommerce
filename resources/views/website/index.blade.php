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
    {{-- @include('website.infobar')
    <!-- satrt summer collection -->
    @php
        $typeOne = $type->find(1);
        $typeTwo = $type->find(2);
        $typeThree = $type->find(3);
        $typeFour = $type->find(4);
        $typeFive = $type->find(5);
        $typeSix = $type->find(6);
        $summerCollections = $typeOne->products()->active()->instock()->latest()->limit(10)->get();
        $winterCollections = $typeTwo->products()->active()->instock()->latest()->limit(10)->get();
        $featuredProducts = $typeThree->products()->active()->instock()->latest()->skip(1)->limit(7)->get();
        $featuredFirstProduct = $typeThree->products()->active()->instock()->latest()->first();
        $newArivals = $typeFour->products()->active()->instock()->latest()->limit(10)->get();
        $trendyTshirts = $typeFive->products()->active()->instock()->latest()->limit(10)->get();
        $gadgetAccessories = $typeSix->products()->active()->instock()->latest()->limit(10)->get();
    @endphp

    @if($typeOne->status == 1)
    <section id="summer_conllection">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="summer_title">
                        <h3>{{$typeOne->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="summer_slide_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="summer_slide_active owl-carousel">
                            @foreach($summerCollections as $summerCollection)
                            <div class="summer_slide_item">
                                <a href="{{url('product/' .$summerCollection->id .'/'. $summerCollection->slug)}}">
                                    <div class="summmer_image">
                                        <img src="{{asset('storage/products/'. $summerCollection->image)}}" alt="">
                                        <div class="sumer_pro_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{url('/cart/add/' .$summerCollection->id)}}"><i class="icofont-shopping-cart"></i></a></li>
                                                <li><a href="{{url('product/' .$summerCollection->id .'/'. $summerCollection->slug)}}"><i class="icofont-eye-alt"></i></a></li>
                                                <li><a href="{{url('/favorite/'.$summerCollection->id)}}"><i class="icofont-ui-love"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="summmer_item_content">
                                        <h4>{{str_limit($summerCollection->name, 20)}}</h4>
                                        <h3>Tk {{$summerCollection->price}}</h3>
                                        @include('website.partial.rating', ['rating' => $summerCollection->reviews()->avg('rating')])
                                        <a class="addtocart" href="{{url('/cart/add/' .$summerCollection->id)}}"><i class="icofont-shopping-cart"></i> Add To Cart</a>
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
    @else
        <section id="summer_conllection">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="summer_title">
                        <h3>{{$typeTwo->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="summer_slide_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="summer_slide_active owl-carousel">
                            @foreach($winterCollections as $winterCollection)
                            <div class="summer_slide_item">
                                <a href="{{url('product/' .$winterCollection->id .'/'. $winterCollection->slug)}}">
                                    <div class="summmer_image">
                                        <img src="{{asset('storage/products/'. $winterCollection->image)}}" alt="">
                                        <div class="sumer_pro_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{url('/cart/add/' .$winterCollection->id)}}"><i class="icofont-shopping-cart"></i></a></li>
                                                <li><a href="{{url('product/' .$winterCollection->id .'/'. $winterCollection->slug)}}"><i class="icofont-eye-alt"></i></a></li>
                                                <li><a href="{{url('/favorite/'.$winterCollection->id)}}"><i class="icofont-ui-love"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="summmer_item_content">
                                        <h4>{{str_limit($winterCollection->name, 20)}}</h4>
                                        <h3>Tk {{$winterCollection->price}}</h3>
                                        @include('website.partial.rating', ['rating' => $winterCollection->reviews()->avg('rating')])
                                        <a class="addtocart" href="{{url('/cart/add/' .$winterCollection->id)}}"><i class="icofont-shopping-cart"></i> Add To Cart</a>
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
    @if($typeThree->status == 1)
    <section id="feature_product">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="feature_product_title">
                        <h3>{{$typeThree->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="featur_product_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="feater_product_image">
                                    <img class="img-fluid" src="{{asset('storage/products/'.$featuredFirstProduct->image)}}" alt="">
                                    <div class="feater_product_image_overlay_content">
                                        <h3>{{str_limit($featuredFirstProduct->name, 20)}}</h3>
                                        <p>{{str_limit($featuredFirstProduct->description, 30)}} </p>
                                        <h6>Tk {{$featuredFirstProduct->price}}</h6>
                                        <a href="{{url('product/'.$featuredFirstProduct->id.'/'.$featuredFirstProduct->slug)}}">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                                <div class="row">
                                    @foreach($featuredProducts as $key=>$featuredProduct)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 pl-0 text-center">
                                        <div class="feater_product_item">
                                            <a href="{{url('product/'.$featuredProduct->id.'/'.$featuredProduct->slug)}}">
                                                <img class="img-fluid" src="{{asset('storage/products/'.$featuredProduct->image)}}" alt="">
                                            </a>
                                            <h4>{{str_limit($featuredProduct->name, 20)}}</h4>
                                            <h3>TK {{$featuredProduct->price}}</h3>
                                            @include('website.partial.rating', ['rating' => $featuredProduct->reviews()->avg('rating')])
                                            <a class="addtocart" href="{{url('cart/add/'.$featuredProduct->id)}}"><i class="icofont-shopping-cart"></i></a>
                                            <a href="{{url('favorite/'.$featuredProduct->id)}}"><i class="fas fa-heart"></i></a>
                                            <a href="{{url('product/'.$featuredProduct->id.'/'.$featuredProduct->slug)}}"><i class="fas fa-exchange-alt"></i></a>
                                        </div>
                                    </div>
                                        @if($key+1 == 3)
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @foreach($featuredProducts as $key=>$featuredProduct)
                                @if($key+1 < 4)
                                    @continue
                                @endif
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="feater_product_item feater_product_item_2">
                                    <a href="{{url('product/'.$featuredProduct->id.'/'.$featuredProduct->slug)}}">
                                        <img class="img-fluid" src="{{asset('storage/products/'.$featuredProduct->image)}}" alt="">
                                    </a>
                                    <a href="{{url('product/'.$featuredProduct->id.'/'.$featuredProduct->slug)}}">
                                        <h4>{{str_limit($featuredProduct->name, 20)}}</h4>
                                    </a>
                                    <h3>Tk {{$featuredProduct->price}}</h3>
                                    @include('website.partial.rating', ['rating' => $featuredProduct->reviews()->avg('rating')])
                                    <a class="addtocart" href="{{url('cart/add/'.$featuredProduct->id)}}"><i class="icofont-shopping-cart"></i></a>
                                    <a href="{{url('favorite/'.$featuredProduct->id)}}"><i class="fas fa-heart"></i></a>
                                    <a href="{{url('product/'.$featuredProduct->id.'/'.$featuredProduct->slug)}}"><i class="fas fa-exchange-alt"></i></a>
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

    @php
        $firstAdd = $add->first();
        $secondAdds = $add->skip(1)->take(2)->get();
        $forthAdd = $add->find(4);
        $fifthAdds = $add->skip(4)->take(2)->get();
        $seventhAdd = $add->find(7);
        $eighthAdd = $add->find(8);
    @endphp
    <!-- start feater image area page -->
    <section id="feater_image_content">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_image_content_img">
                        <a href="{{$firstAdd->url}}">
                            <img class="img-fluid" src="{{asset('storage/adds/'.$firstAdd->image)}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    @foreach($secondAdds as $secondAdd)
                    <div class="feater_image_content_img">
                        <a href="{{$secondAdd->url}}">
                            <img class="img-fluid" src="{{asset('storage/adds/'.$secondAdd->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_image_content_img">
                        <a href="{{$forthAdd->url}}">
                            <img class="img-fluid" src="{{asset('storage/adds/'.$forthAdd->image)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start new arival -->
    @if($typeFour->status == 1)
    <section id="newarival">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="new_arival_title">
                        <h3>{{$typeFour->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="new_arival_container">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="new_arival_slider_active owl-carousel">
                                @foreach($newArivals as $newArival)
                                <!-- single item -->
                                <div class="new_arival_item">
                                    <a href="{{url('product/' .$newArival->id .'/'. $newArival->slug)}}">
                                        <div class="new_arival_image">
                                            <img src="{{asset('storage/products/'.$newArival->image)}}" alt="">
                                            <div class="new_arival_hover">
                                                <ul>
                                                    <li><a class="addtocart" href="{{url('cart/add/'.$newArival->id)}}"><i class="icofont-ui-cart"></i></a></li>
                                                    <li><a href="{{url('/favorite/'.$newArival->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                    <li><a href="{{url('product/' . $newArival->id . '/' . $newArival->slug)}}"><i class="icofont-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="new_arival_content">
                                            <a href="{{url('product/' .$newArival->id .'/'. $newArival->slug)}}">
                                                <h4>{{str_limit($newArival->name, 20)}}</h4>
                                            </a>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="new_arival_content_price">
                                                        <h3>Tk {{$newArival->price}}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="new_arival_content_reating">
                                                        @include('website.partial.rating', ['rating' => $newArival->reviews()->avg('rating')])
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
    @if($typeFive->status == 1)
    <!-- start tshirt area -->
    <section id="teshirt">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="teshirt_title">
                        <h3>{{$typeFive->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="teshirt_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="teshirt_slide_active owl-carousel">
                            <!--single item-->
                            @foreach($trendyTshirts as $trendyTshirt)
                            <div class="teshirt_slide_item">
                                <a href="{{url('product/' .$trendyTshirt->id .'/'. $trendyTshirt->slug)}}">
                                    <div class="teshirt_slide_image">
                                        <img src="{{asset('storage/products/'.$trendyTshirt->image)}}" alt="">
                                        <div class="teshirt_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{url('cart/add/'.$trendyTshirt->id)}}"><i class="icofont-ui-cart"></i></a></li>
                                                <li><a href="{{url('/favorite/'.$trendyTshirt->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                <li><a href="{{url('product/' . $trendyTshirt->id . '/' . $trendyTshirt->slug)}}"><i class="icofont-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="teshirt_slide_cotent">
                                        <a href="{{url('product/' .$trendyTshirt->id .'/'. $trendyTshirt->slug)}}">
                                            <h4>{{str_limit($trendyTshirt->name)}}</h4>
                                        </a>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="teshirt_slide_cotent_price">
                                                    <h3>Tk {{$trendyTshirt->price}}</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="teshirt_slide_cotent_rating">
                                                    @include('website.partial.rating', ['rating' => $trendyTshirt->reviews()->avg('rating')])
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
                        @foreach($fifthAdds as $fifthAdd)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="feater_product_2_item_img">
                                <a href="{{$fifthAdd->url}}">
                                    <img class="img-fluid" src="{{asset('storage/adds/'.$fifthAdd->image)}}" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-xl-12">
                            <div class="feater_product_2_item_img">
                                <a href="{{$eighthAdd->url}}">
                                    <img class="img-fluid" src="{{asset('storage/adds/'.$eighthAdd->image)}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="feater_product_2_item_img">
                        <a href="{{$seventhAdd->url}}">
                            <img class="img-fluid" src="{{asset('storage/adds/'.$seventhAdd->image)}}" alt="">
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
                        <a href="{{url('product/brand/'. $brand->slug)}}">
                            <img src="{{asset('storage/brands/'.$brand->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if($typeSix->status == 1)
    <!--start Gadget-->
    <section id="gadget">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="gadget_title">
                        <h3>{{$typeSix->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="gadget_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="gadegt_slider_active owl-carousel">
                            <!-- single item -->
                            @foreach($gadgetAccessories as $gadgetAccessory)
                            <div class="gadget_slid_item">
                                <a href="{{url('product/' .$gadgetAccessory->id .'/'. $gadgetAccessory->slug)}}">
                                    <div class="gadget_slid_image">
                                        <img src="{{asset('storage/products/'.$gadgetAccessory->image)}}" alt="">
                                        <div class="gadget_hover">
                                            <ul>
                                                <li><a class="addtocart" href="{{url('cart/add/'.$gadgetAccessory->id)}}"><i class="icofont-ui-cart"></i></a></li>
                                                <li><a href="{{url('/favorite/'.$gadgetAccessory->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                <li><a href="{{url('product/' . $gadgetAccessory->id . '/' . $gadgetAccessory->slug)}}"><i class="icofont-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                                <div class="gadget_slid_content">
                                    <a href="{{url('product/' .$gadgetAccessory->id .'/'. $gadgetAccessory->slug)}}">
                                        <h4>{{str_limit($gadgetAccessory->name, 20)}}</h4>
                                    </a>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="gadget_slid_content_price">
                                                <h3>Tk {{$gadgetAccessory->price}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="gadget_slid_content_reating">
                                                @include('website.partial.rating', ['rating' => $gadgetAccessory->reviews()->avg('rating')])
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
    <section id="tab_product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            @foreach($categories as $key=>$category)
                            <a class="product_tab_link {{$key+1 == 1 ? 'active' : ''}}" data-toggle="tab" href="#{{$category->slug}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($categories as $key=>$category)
                            <div class="tab-pane fade show {{$key+1 == 1 ? 'active' : ''}}" id="{{$category->slug}}" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    @php
                                        $products = $category->products()->limit(8)->get();
                                    @endphp
                                    @foreach($products as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <a href="{{url('product/' .$product->id .'/'. $product->slug)}}">
                                            <div class="tab_product_item text-center">
                                                <div class="tab_product_image">
                                                    <img class="img-fluid" src="{{asset('storage/products/'.$product->image)}}" alt="">
                                                    <div class="product_tab_hover">
                                                        <ul>
                                                            <li><a class="addtocart" href="{{url('cart/add/'.$product->id)}}"><i class="icofont-ui-cart"></i></a></li>
                                                            <li><a href="{{url('/favorite/'.$product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                            <li><a href="{{url('product/' . $product->id . '/' . $product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tab_product_contnt">
                                                    @include('website.partial.rating', ['rating' => $product->reviews()->avg('rating')])
                                                    <a href="{{url('product/' .$product->id .'/'. $product->slug)}}">
                                                        <h4>{{str_limit($product->name, 20)}}</h4>
                                                    </a>
                                                    <h3>Tk {{$product->price}}</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <form id="addtocart" action="" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
@push('js')
    <script src="{{asset('contents/website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('contents/website/js/owl.carousel.active.js')}}"></script>
    <script>
        $(function () {
            $('.banar_slider_active').owlCarousel({
                loop: true,
                margin: 0,
                navText: ["<i class='icofont-long-arrow-left'></i>", "<i class='icofont-long-arrow-right'></i>"],
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                mouseDrag: false,
                nav: @if($slider->arrows) true @else false @endif,
                autoplay: @if($slider->autoplay) true @else false @endif,
                autoplayTimeout: @php echo $slider->autoplay_speed @endphp,
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
