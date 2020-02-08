@extends('layouts.website')
@section('title', $product->name)
@push('css')
    <link rel="stylesheet" href="{{asset('contents/website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('contents/website/css/better-rating.css')}}">
@endpush
@section('content')
    <!-- start infobar top -->
    @include('website.partial.infobar')
    <!-- satrt breadcome area -->
    @component('website.partial.breadcumb')
    @if($product->categories->count())
    <li>@foreach($product->categories as $category)<a href="{{ route('product.category', $category->slug) }}"><i class="icofont-thin-right"></i>  {{ $category->name }} </a>@endforeach</li>
    <li>@foreach($category->children as $subcategory)<a href="route('product.category', $subcategory->slug) }}"><i class="icofont-thin-right"></i>  {{  $subcategory->name}} </a>@endforeach</li>
    @endif
    <li><i class="icofont-thin-right"></i> {{ $product->name }} </li>
    @endcomponent
    <!-- start product details main section -->
    <section id="product_details">
        <div class="container">
            <div class="row">
                <!-- details sidebar -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-7 mx-auto">
                    <div class="details_sidebar">
                        <!-- details brands -->
                        <div class="details_brands">
                            <h4>Brands</h4>
                            <ul>
                                @foreach($brands as $brand)
                                <li><a href="{{ route('product.brand', $brand->slug) }}">{{ $brand->name }} <span>{{$brand->products()->count()}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- product details main part -->
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="details_main_content">
                        <div class="details_slide_content">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="details_slide_active_top">
                                        <div class="details_slide_item">
                                            <img class="img-fluid" src="{{ asset($product->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                        </div>
                                        @foreach($product->images as $image)
                                        <div class="details_slide_item">
                                            <img class="img-fluid" src="{{ asset($image->path()) }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="details_slide_active_bottom">
                                        <div class="details_slide_item_bottom">
                                            <img class="img-fluid" src="{{ asset($product->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                        </div>
                                        @foreach($product->images as $image)
                                        <div class="details_slide_item_bottom">
                                            <img class="img-fluid" src="{{ asset($image->path()) }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7">
                                    <div class="product_slide_right_content">
                                        <h3>{{ $product->name }} </h3>
                                        <h4>Product Code: {{ $product->sku }}</h4>
                                        <h2>&#2547; {{ $product->price }}</h2>
                                        <p>{{ $product->short_description }}. </p>
                                        <form action="{{ route('cart.add', $product->id)}}" method="post">
                                            @csrf
                                            <div class="details_size">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">sizes:</legend>
                                                    <div class="col-sm-10">
                                                        {{--@foreach($product->sizes as $size)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="size" id="gridRadios1" value="{{$size->name}}" checked>
                                                            <label class="form-check-label" for="gridRadios1">{{$size->name}}</label>
                                                        </div>
                                                        @endforeach--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="details_size">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">Colors:</legend>
                                                    <div class="col-sm-10">
                                                        {{--@foreach($product->colors as $color)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="color" id="gridRadios1" value="{{$color->name}}" checked>
                                                            <label class="form-check-label" for="gridRadios1">{{$color->name}}</label>
                                                        </div>
                                                        @endforeach --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="details_btn">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-4 col-md-4 col-sm-5">
                                                        <div class="quantity_form_input">
                                                            <input name="qty" type="number" value="1" min="1" max="{{ $product->qty }}" step="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-md-8 col-sm-7">
                                                        <button class="detail_shop_btn"><i class="icofont-shopping-cart"></i> Buy Now</button>
                                                        <a href="{{ route('customer.favorite', $product->id) }}"><i class="fas fa-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="details_share">
                                            <div class="row align-items-center">
                                                <div class="col-xl-4">
                                                    <div class="share_text">
                                                        <p>Share Product :-</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="share_social">
                                                        <ul>
                                                            <li><a href="#"><i class="fab face fa-facebook-f"></i></a></li>
                                                            <li><a href="#"><i class="fab twi fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fab lin fa-linkedin-in"></i></a></li>
                                                            <li><a href="#"><i class="fab pin fa-pinterest-p"></i></a></li>
                                                            <li><a href="#"><i class="fab go fa-google-plus-g"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment_accept">
                                            <div class="row align-items-center">
                                                <div class="col-xl-4">
                                                    <div class="payment_accept_text">
                                                        <p>We Accept :-</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="payment_accept_img">
                                                        <img class="img-fluid" src="{{asset('contents/website/img/payment-icons.png')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- satrt details tab area -->
                        <div class="details_tab_section">
                            <div class="row">
                                <div class="col-xl-12 ">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Feature</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Product Description</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Rating</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <ul>
                                                @foreach($product->attributes as $attribute)
                                                <li><i class="icofont-thin-double-right"></i> {{ $attribute->attribute->name }}: @foreach($attribute->values as $value) {{ $value->value }} @endforeach</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                            {!! $product->description !!}

                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="list list-row block">
                                                @foreach($product->reviews as $review)
                                                <div class="list-item" data-id="19">
                                                    <div><span class="w-48 avatar gd-warning">{{substr($review->name, 0,1)}}</span></div>
                                                    <div class="flex"> 
                                                        <a href="javascript:void(0)" class="item-author text-color" data-abc="true">{{ $review->name }}</a>
                                                        <div class="item-except text-muted text-sm h-1x">{{ $review->description }}</div>
                                                    </div>
                                                    <div class="no-wrap summmer_item_content">
                                                        @include('website.partial.rating', ['rating' => $review->rating])
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                            @auth('customer')
                                            <form action="{{ url('product/review/', $product->id) }}" method="post" id="better-rating-form">
                                                @csrf

                                                <input type="text" name="name" placeholder="Your Name"  required>
                                                <div class="rating">
                                                    <i class="far fa-star" data-rate="1"></i>
                                                    <i class="far fa-star" data-rate="2"></i>
                                                    <i class="far fa-star" data-rate="3"></i>
                                                    <i class="far fa-star" data-rate="4"></i>
                                                    <i class="far fa-star" data-rate="5"></i>
                                                    <input type="hidden" id="rating-count" name="rating" value="0">
                                                </div>
                                                <textarea name="description" cols="30" rows="7" required></textarea>
                                                <button type="submit" class="btn btn-danger">Submit Now</button>
                                            </form>
                                            @else
                                                <ul>
                                                    <li><i class="icofont-thin-double-right"></i> Please <a href="{{ route('customer.login') }}">login</a> before to give review.</li>
                                                </ul>
                                            @endauth
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
    <!-- satrt related product -->
    @if($relatedProducts->count())
    <section id="related_product">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="reated_slide_title">
                        <h4>Related Products</h4>
                    </div>
                </div>
            </div>
            <div class="related_product_slide_container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="related_product_slide_active owl-carousel">
                            <!-- single product -->
                            @foreach($relatedProducts as $relatedProduct)
                            <div class="related_product_slide_item">
                                <div class="related_product_slide_item_image">
                                    <a href="{{ route('product', $relatedProduct->slug)}}">
                                        <img class="img-fluid" src="{{asset($relatedProduct->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                    </a>
                                    <div class="related_product_slide_item_hover">
                                        <ul>
                                            <li><a class="addtocart" href="{{ route('cart.add', $relatedProduct->id)}}"><i class="icofont-ui-cart"></i></a></li>
                                            <li><a class="addtofavorite" href="{{ route('customer.favorite', $relatedProduct->id)}}"><i class="icofont-ui-love"></i></a></li>
                                            <li><a href="{{ route('product', $relatedProduct->slug) }}"><i class="icofont-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="related_product_slide_item_content text-center">
                                    <h4>{{ str_limit($relatedProduct->name, 20) }}</h4>
                                    <h3>&#2547; {{ $relatedProduct->price }}</h3>
                                    <a class="addtocart" href="{{ route('cart.add', $relatedProduct->id)}}"><i class="icofont-shopping-cart"></i> Add To Cart</a>
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
@endsection
@push('js')
    <script src="{{asset('contents/website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('contents/website/js/owl.carousel.active.js')}}"></script>
    <script src="{{asset('contents/website/js/slick.min.js')}}"></script>
    <script src="{{asset('contents/website/js/slick.active.js')}}"></script>
    <script src="{{asset('contents/website/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('contents/website/js/better-rating.js')}}"></script>
    <script>
        $(function(){
            // this is for input group
            $("input[type='number']").InputSpinner();
            $('#better-rating-form').betterRating();
        });
    </script>
@endpush
