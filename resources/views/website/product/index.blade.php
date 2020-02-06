@extends('layouts.website')
@section('title', 'Products')
@section('content')
@push('css')
    <link rel="stylesheet" href="{{asset('contents/website/assests/css/owl.carousel.min.css')}}">
@endpush
    @include('website.partial.infobar')
    <!-- satrt product page main container -->
    <section id="product_page_main_container">
        <div class="container">
            <div class="row justify-content-center">
                @if($products->count() > 0)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="product_page_sidebar">
                        <!-- product category -->
                        <div class="product_page_category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach($products as $product)
                                    @foreach($product->categories as $category)
                                    <li><a href="{{ url('product/category/'. $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach 
                                @endforeach
                            </ul>
                        </div>
                        <!-- start product brands -->
                        <div class="productpage_brands">
                            <h4>BRANDS</h4>
                            <ul>
                                @foreach($products as $product)
                                    <li><a href="{{url('product/brand/'. $product->brand->slug)}}">{{$product->brand->name}} 
                                    <span>{{$product->brand->products()->count()}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- product page marcent -->
                        <!-- <div class="product_marcent">
                            <h4>MERCHANTS</h4>
                            <ul>
                                <li><a href="#">24 Gadget</a></li>
                                <li><a href="#">3W</a></li>
                                <li><a href="#">A.B Electronics</a></li>
                                <li><a href="#">Abito Style</a></li>
                                <li><a href="#">Acme Moshari & Fabrics Ltd</a></li>
                                <li><a href="#">Alif's Collection</a></li>
                                <li><a href="#">Anas Group</a></li>
                                <li><a href="#">Apple of The Eye</a></li>
                                <li><a href="#">Armsun Bd</a></li>
                                <li><a href="#">Asha's Collection</a></li>
                                <li><a href="#">Asrafia Stationary</a></li>
                                <li><a href="#">AZM Shop</a></li>
                            </ul>
                        </div> -->
                        <!-- product page feater product slider -->
                        {{--<div class="product_page_feater_product">
                            <h4>FEATURED PRODUCTS</h4>
                            <div class="product_page_feater_product_slide_active owl-carousel">
                                @php
                                    $featuredProducts = App\Type::find(3)->products()->active()->instock()->latest()->get();
                                @endphp
                                @if($featuredProducts->count() > 3)
                                <div class="product_page_feater_product_slide_item">
                                    <div class="row">
                                        @foreach($featuredProducts as $key=>$featuredProduct)
                                        <a href="{{url('product/detail/'. $featuredProduct->slug)}}">
                                            <div class="ppage_iner_slide_item">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                        <div class="product_page_feater_product_slide_item_image">
                                                            <img class="img-fluid" src="{{asset('storage/products/'.$featuredProduct->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                        <div class="product_page_feater_product_s_con">
                                                            <h4>{{str_limit($featuredProduct->name, 20)}}</h4>
                                                            <h3>&#2547; {{$featuredProduct->price}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                            @if($key+1 == 3)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if($featuredProducts->count() > 5)
                                <div class="product_page_feater_product_slide_item">
                                    <div class="row">
                                        @foreach($featuredProducts as $key=>$featuredProduct)
                                        @if($key+1 < 4)
                                            @continue
                                        @endif
                                        <a href="{{url('product/detail/'. $featuredProduct->slug)}}">
                                            <div class="ppage_iner_slide_item">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                        <div class="product_page_feater_product_slide_item_image">
                                                            <img class="img-fluid" src="{{asset('storage/products/'.$featuredProduct->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                        <div class="product_page_feater_product_s_con">
                                                            <h4>{{str_limit($featuredProduct->name, 20)}}</h4>
                                                            <h3>&#2547; {{$featuredProduct->price}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                            @if($key+1 == 6)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if($featuredProducts->count() > 8)
                                <div class="product_page_feater_product_slide_item">
                                    <div class="row">
                                        @foreach($featuredProducts as $key=>$featuredProduct)
                                        @if($key+1 < 7)
                                            @continue
                                        @endif
                                        <a href="{{url('product/detail/'. $featuredProduct->slug)}}">
                                            <div class="ppage_iner_slide_item">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                                        <div class="product_page_feater_product_slide_item_image">
                                                            <img class="img-fluid" src="{{asset('storage/products/'.$featuredProduct->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                        <div class="product_page_feater_product_s_con">
                                                            <h4>{{str_limit($featuredProduct->name, 20)}}</h4>
                                                            <h3>&#2547; {{$featuredProduct->price}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                            @if($key+1  == 9)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>--}}
                    </div>
                </div>
                @endif
                <div class="col-xl-9 col-lg-8 col-md-8 col-sm-6">
                    <div class="product_page_product_container">
                        <div class="row">

                            <!-- single product -->
                            @forelse($products as $product)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <a href="{{ route('product', $product->slug) }}">
                                    <div class="product_page_product">
                                        <div class="product_page_product_image">
                                            <img class="img-fluid" src="{{ asset($product->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                            <div class="produtc_page_product_hover">
                                                <ul>
                                                    <li>
                                                        <a class="addtocart" href="{{ route('cart.add', $product->id)}}">
                                                            <i class="icofont-ui-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('customer.favorite', $product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                    <li><a href="{{ route('product', $product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_page_product_content text-center">
                                            <h4>{{str_limit($product->name, 20)}}</h4>
                                            <h3>&#2547; {{$product->price}}</h3>
                                            <a class="addtocart" href="{{ route('cart.add', $product->id)}}"><i class="icofont-ui-cart"></i> Add To Cart</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div id="notfound">
                                    <div class="notfound">
                                        <div class="notfound-404">
                                            <h3>Oops! No Product found</h3>
                                            <h1><span>4</span><span>0</span><span>4</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                            <!-- single product -->
                        </div>
                    </div>
                    @if($products->count() > 0)
                    <div class="product_page_pagination">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pagination_info">
                                    <p>Showing {{$products->count()}} of  {{$products->total()}} results</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pgination_content">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                {{$products->appends(request()->only(['query']))->links()}}
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{asset('contents/website/assests/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('contents/website/assests/js/owl.carousel.active.js')}}"></script>
@endpush
