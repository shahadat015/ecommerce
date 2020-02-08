@extends('layouts.website')
@section('title', 'Products')
@section('content')
@push('css')
    <link rel="stylesheet" href="{{asset('contents/website/css/owl.carousel.min.css')}}">
@endpush
    @include('website.partial.infobar')
    <!-- satrt product page main container -->
    <section id="product_page_main_container">
        <div class="container">
            <div class="row justify-content-center">
                @if($products->count() > 0)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    @include('website.product.sidebar')
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
                                                    <li><a class="addtofavorite" href="{{ route('customer.favorite', $product->id)}}"><i class="icofont-ui-love"></i></a></li>
                                                    <li><a href="{{ route('product', $product->slug)}}"><i class="icofont-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_page_product_content text-center">
                                            <h4>{{ str_limit($product->name, 20) }}</h4>
                                            <h3>&#2547; {{ $product->price }}</h3>
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
                                {{ $products->appends(request()->only(['query']))->links('website.partial.pagination') }}
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
    <script src="{{asset('contents/website/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('contents/website/js/owl.carousel.active.js')}}"></script>
@endpush
