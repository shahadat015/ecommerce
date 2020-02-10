@extends('layouts.website')
@section('title', 'Order Confirm')
@section('content')

    <!-- start card process progress -->
    <section id="payment_process">
        <div class="container">
            @include('website.partial.stepsbar')
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
                                    @foreach(Cart::content() as $cartItem)
                                    <tr>
                                        <td>{{ $cartItem->name }}</td>
                                        <td>Tk {{ $cartItem->price }}</td>
                                        <td>{{ $cartItem->qty }} Items</td>
                                        <td>Tk {{ $cartItem->total }}</td>
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
                                        <td>Payment Method: {{ $order->transaction->payment_method ?? "Cash on Hand" }}</td>
                                        <td>Transaction ID: {{ $order->transaction->transaction_id ?? 'No transaction ID' }}</td>
                                        <td>Amount: {{ $order->transaction->amount ?? 'Tk 0.00' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="delevary_information">
                            <h3>Billing infomation</h3>
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
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td>{{ $order->customer_email }}</td>
                                        <td>{{ $order->billing_country }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#767676">City</td>
                                        <td style="color:#767676">Zipcode</td>
                                        <td style="color:#767676">Address</td>
                                    </tr>
                                    <tr>
                                        <td>{{$order->billing_city }}</td>
                                        <td>{{ $order->billing_zip }}</td>
                                        <td>{{ $order->billing_address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="total_price">
                            <h4><span>Toral Price : </span>Tk {{ $order->total }}</h4>
                        </div>
                    </div>
                    <div class="payment_process_btn">
                        <a href="{{ route('payment') }}">Back to Payment</a>
                        <a href="{{ route('payment.success') }}">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection