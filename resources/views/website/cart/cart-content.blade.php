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
                        <li>Sub-Total:<span>Tk {{ Cart::subtotal() }}</span></li>
                        <form action="{{ route('checkout') }}" method="get" id="checkout-form">
                            <div class="form-group">
                                <label><b>Shipping Method</b></label>
                                @if(Cart::freeshippingAble())
                                <div class="custom-control custom-radio mb-1">
                                    <input type="radio" id="customRadioInline1" name="shipping_method" class="shipping-method custom-control-input" data-amount="{{ Cart::total() }}" value="free_shipping" checked>
                                    <label class="custom-control-label" for="customRadioInline1">{{ config('settings.free_shipping_label') }} </label><span class="float-right">Tk 0.00</span>
                                </div>
                                @endif
                                @if(Cart::localPicupEnabled())
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadioInline2" name="shipping_method" class="shipping-method custom-control-input" data-amount="{{  Cart::total() + Cart::localPicupCost() }}" value="local_pickup" {{  Cart::freeshippingAble() ? '' : 'checked' }}>
                                    <label class="custom-control-label" for="customRadioInline2">{{ config('settings.local_pickup_label') }} </label><span class="float-right">Tk {{ Cart::localPicupCost() }}</span>
                                </div>
                                @endif
                                @if(!Cart::freeshippingAble() && !Cart::localPicupEnabled())
                                    <h6 class="text-danger">No shipping method enabled</h6>
                                @endif
                            </div>
                        </form>
                        @if(Cart::coupon())
                        <li>Coupon ({{ Cart::coupon()->code }}) applied:<span>Tk ({{ Cart::couponDiscount() }})</span></li>
                        @endif
                        <li class="sum_total">Total:<span class="cart-total">Tk {{ Cart::cartAmount() }}</span></li>
                    </ul> <a href="{{ route('checkout') }}" class="btn-checkout">Continue to Checkout</a> 
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