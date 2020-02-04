@extends('layouts.website')
@section('title', 'Order Confirm')
@section('content')

    <!-- start card process progress -->
    <section id="payment_process">
        <div class="container">
            @include('website.checkout.stepsbar')
        </div>
    </section>
    <!-- confirm order content -->
    <section id="cofirm_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cofirm_page_container">
                        <div class="confirm_product">
                            <h3>Shopping Cart</h3>
                            <table class="table">
                                <tbody>
                                    @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td>{{$cartItem->name}}</td>
                                        <td>Tk {{$cartItem->price}}</td>
                                        <td>{{$cartItem->qty}} Items</td>
                                        <td>Tk {{$cartItem->total}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="payment_method">
                            <h3>Payment information</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name: {{$payment->name}}</td>
                                        <td>Card No: {{$payment->card_number}}</td>
                                        <td>Exp Date: {{$payment->exp_month}}, {{$payment->exp_year}}</td>
                                        <td>CVV: {{$payment->cvv}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="delevary_information">
                            <h3>Delivery infomation</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:#767676">Name</th>
                                        <th style="color:#767676">Phone</th>
                                        <th style="color:#767676">Email</th>
                                        <th style="color:#767676">Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$shipping->first_name}} {{$shipping->last_name}}</td>
                                        <td>{{$shipping->phone}}</td>
                                        <td>{{$shipping->email}}</td>
                                        <td>{{$shipping->country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#767676">City</td>
                                        <td style="color:#767676">Zipcode</td>
                                        <td style="color:#767676">Address</td>
                                    </tr>
                                    <tr>
                                        <td>{{$shipping->city->name}}</td>
                                        <td>{{$shipping->zip_code}}</td>
                                        <td>{{$shipping->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="total_price">
                            <h4><span>Toral Price : </span>Tk {{cart::total() + 50}}</h4>
                        </div>
                    </div>
                    <div class="payment_process_btn">
                        <a href="{{url('delivery/method')}}">Delivery Methods</a>
                        <a href="{{url('order/confirm')}}" onclick="event.preventDefault();
                        document.getElementById('order-form').submit();">Proceed to Checkout</a>
                    </div>
                    <form action="{{url('order/confirm')}}" method="post" id="order-form">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection