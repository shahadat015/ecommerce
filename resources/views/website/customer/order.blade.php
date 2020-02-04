@extends('layouts.website')
@section('title', 'Orders')
@section('content')

    <!-- satrt user dashboard index -->
    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.customer.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="user_dashboard_sidebar_main_content">
                        <div class="order_status_container">
                            @forelse($orders as $order)
                            <a href="{{url('customer/order/details/'.$order->id)}}">
                                <div class="order_status_item">
                                    <div class="row align-items-center">
                                        <div class="col-xl-3 col-md-3 col-sm-3">
                                            @php
                                                $product = App\Order::find($order->id)->products()->first();
                                                $productImage = App\Product::find($product->product_id);
                                            @endphp
                                            <div class="order_status_item_image">
                                                <img class="img-fluid" src="{{asset('storage/products/'.$productImage->image)}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="order_status_item_info">
                                                <h4>{{$product->name}}</h4>
                                                <h5>Order total: Tk {{$order->order_total}}</h5>
                                                <p>Order Date: {{$order->created_at->format('d M Y')}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3 col-sm-3">
                                            <div class="order_status_item_info_status">
                                                @if($order->status == 1)
                                                <span class="badge badge-info">Progerss</span>
                                                @elseif($order->status == 2)
                                                <span class="badge badge-success">Delivered</span>
                                                @else
                                                <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="col-xl-12">
                                <div class="success_message_content text-center">
                                    <span><i class="icofont-close"></i></span>
                                    <h3>There have no items you buyed</h3>
                                    <p>Please buy some product as you like.</p>
                                    <a href="{{url('/')}}">Retuen Shop</a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div/>
                    @if($orders->count() > 0)
                    <div class="product_page_pagination">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pagination_info">
                                    <p>Showing {{$orders->count()}} of  {{$orders->total()}} Orders</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="pgination_content">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                {{$orders->links()}}
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