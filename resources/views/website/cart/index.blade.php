@extends('layouts.website')
@section('title', 'Shopping Cart')
@section('content')
    @if(Cart::count())
    <section id="payment_process">
        <div class="container">
            @include('website.partial.stepsbar')
        </div>
    </section>
    @endif
    <!-- satrt cart section -->
    <section id="my_cart">
        <div class="container">
            <div  id="cart-content" class="row">
                @if(Cart::count())
                <div class="col-xl-12">
                    <div class="cart_main_content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Remove</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product(s) </th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- single add to cart item-->
                                @foreach(Cart::content() as $cartItem)
                                <tr scope="row">
                                    <td class="remove_btn_cart">
                                        <a class="removefromcart" href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="icofont-trash"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <img width="80" class="img-fluid" src="{{ asset($cartItem->options->image) }}" alt=""></td>
                                    <td>
                                        <h4>{{ $cartItem->name }}</h4>
                                        @foreach($cartItem->options->options as $option)
                                            <p>{{ $option->name }}:  {{ $option->values->implode('label', ', ') }}</p>
                                        @endforeach
                                    </td>
                                    <td class="add_cart_price text-center">&#2547; {{ $cartItem->price }}</td>
                                    <td>
                                        <div class="quantity_form_input btn-qty">
                                            <input data-rowid="{{ $cartItem->rowId }}" type="number" value="{{ $cartItem->qty }}" min="1" max="100" step="1"> 
                                        </div>
                                    </td>
                                    <td class="add_cart_price_total text-center">&#2547; {{ $cartItem->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="cart_sumary">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-6">
                                <div class="cart_sum_btn"> <a href="{{ route('cart')}}">Update Cart</a> <a class="btn_cart_sum_sp" href="{{ url('/') }}"><i class="icofont-shopping-cart"></i> Continue Shoping</a> </div>
                                <div class="copon_apply_form">
                                    <input type="text" placeholder="Coupe Code">
                                    <button type="submit">Apply Code</button>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="cart_sum_content">
                                    <ul>
                                        @php
                                            $freeShippingEnabled = config('settings.free_shipping_enabled');
                                            $freeShippingMinAmount = config('settings.free_shipping_min_amount');
                                            $localPicupEnabled = config('settings.local_pickup_enabled');
                                            $localPicupCost = config('settings.local_pickup_cost');
                                            $freeshippingAble = $freeShippingEnabled && $freeShippingMinAmount < Cart::subtotal();
                                            $cartTotal = $freeshippingAble ? Cart::total() : Cart::total() + $localPicupCost;
                                        @endphp
                                        <li>Sub-Total:<span>Tk {{ Cart::subtotal() }}</span></li>
                                        <div class="form-group">
                                            <label><b>Shipping Method</b></label>
                                            @if($freeShippingEnabled && $freeshippingAble)
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" id="customRadioInline1" name="shipping_method" class="shipping-method custom-control-input" value="{{ Cart::total() }}" checked>
                                                <label class="custom-control-label" for="customRadioInline1">{{ config('settings.free_shipping_label') }} </label><span class="float-right">Tk 0.00</span>
                                            </div>
                                            @endif
                                            @if($localPicupEnabled)
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadioInline2" name="shipping_method" class="shipping-method custom-control-input" value="{{  Cart::total() + $localPicupCost }}" {{  !$freeshippingAble ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customRadioInline2">{{ config('settings.local_pickup_label') }} </label><span class="float-right">Tk {{ $localPicupCost }}</span>
                                            </div>
                                            @endif
                                            @if(!$localPicupEnabled && !$freeShippingEnabled)
                                                <h6 class="text-danger">No shipping method enabled</h6>
                                            @endif
                                        </div>
                                        <li class="sum_total">Total:<span class="cart-total">Tk {{ $cartTotal }}</span></li>
                                    </ul> <a href="{{ route('checkout') }}">Continue to Checkout</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-12 my-5 py-5">
                    <div class="success_message_content text-center">
                        <span><i class="icofont-close"></i></span>
                        <h3>There are no items in this cart</h3>
                        <p>Please add some item in your shopping cart.</p>
                        <a href="{{ route('home') }}">Retuen Shop</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{asset('contents/website/js/bootstrap-input-spinner.js')}}"></script>
    <script>  
        $(function () {
            $("input[type='number']").InputSpinner();

            $(document).on('change', '.shipping-method', function(){
                var amount = $(this).val();
                $('.cart-total').html('<span>Tk '+ amount +' </span>');
            });
        });
    </script>
@endpush
