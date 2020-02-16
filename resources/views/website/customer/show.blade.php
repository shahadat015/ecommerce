@extends('layouts.website')
@section('title', 'Customer Account')
@section('content')

    <!-- satrt user dashboard index -->
    <section id="user_dashboard_main_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    @include('website.partial.sidebar')
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
                                        <th style="color:#767676">Options</th>
                                        <th style="color:#767676">Total</th>
                                    </tr>
                                    @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->product->name }}</td>
                                        <td>{{ $product->unit_price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                            @forelse($product->options as $option) 
                                               <p> {{ $option->option->name }} : {{ $option->values->implode('label', ', ') }} </p>
                                               @empty
                                               <p>-------</p>
                                            @endforelse
                                        </td>
                                        <td>Tk {{ $product->line_total }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right" colspan="4">Subtotal:</td>
                                        <td>Tk {{ $order->sub_total }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="4">Delivery Charge:</td>
                                        <td>Tk {{ $order->shipping_cost }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="4">Total:</td>
                                        <td>Tk {{ $order->total }}</td>
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