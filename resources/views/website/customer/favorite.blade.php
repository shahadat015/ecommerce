@extends('layouts.website')
@section('title', 'Favorite products')
@section('content')

    <!-- satrt user dashboard index -->
    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.partial.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="user_dashboard_sidebar_main_content">
                        <div class="order_status_container">
                            @forelse($favorites as $product)
                                <div class="order_status_item">
                                    <div class="row align-items-center">
                                        <div class="col-xl-3 col-md-3 col-sm-3">
                                            <div class="order_status_item_image">
                                                <a href="{{ route('product', $product->slug)}}">
                                                    <img class="img-fluid" src="{{ asset($product->image) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="order_status_item_info">
                                                <a href="{{ route('product', $product->slug) }}"><h4>{{ $product->name }}</h4></a>
                                                <h5>Price: Tk {{ $product->price }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3">
                                            <div class="order_status_item_info_status">
                                                <a href="{{ route('favorite', $product->id) }}">
                                                    <span class="badge badge-danger">Remove</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <div class="col-xl-12">
                                <div class="success_message_content text-center">
                                    <span><i class="icofont-close"></i></span>
                                    <h3>There have no items in your favorite list</h3>
                                    <p>Please add some product as you like.</p>
                                    <a href="{{ route('home') }}">Retuen Shop</a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div/>
                    @if($favorites->count() > 0)
                    <div class="product_page_pagination">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pagination_info">
                                    <p>Showing {{ $favorites->count() }} of  {{ $favorites->total() }} Orders</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pgination_content">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                {{$favorites->links()}}
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
    <!-- end user dashboard index -->
@endsection