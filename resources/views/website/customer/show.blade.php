@extends('layouts.website')
@section('title', 'Customer Account')
@section('content')

    <!-- satrt user dashboard index -->
    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.customer.sidebar')
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="cofirm_page_container">
                        <div class="confirm_product">
                            <h3>Order Details</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="color:#767676">Name</th>
                                        <th style="color:#767676">Price</th>
                                        <th style="color:#767676">Qty</th>
                                        <th style="color:#767676">Color</th>
                                        <th style="color:#767676">Size</th>
                                        <th style="color:#767676">Total</th>
                                    </tr>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->color != NULL ? $product->size : '--'}}</td>
                                        <td>{{$product->size != NULL ? $product->color : '--'}}</td>
                                        <td>{{$product->price * $product->qty}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right" colspan="5">Subtotal:</td>
                                        <td>Tk {{$order->order_total}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5">Delivery Charge:</td>
                                        <td>Tk {{$order->shipping_charge}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="5">Total:</td>
                                        <td>Tk {{$order->order_total + $order->shipping_charge}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end user dashboard index -->
@endsection