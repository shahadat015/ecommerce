@if(Cart::count() > 0)
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
                        <a class="removetocart" href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="icofont-trash"></i></a></td>
                    <td class="text-center">
                        <img width="80" class="img-fluid" src="{{ asset($cartItem->options->image) }}" alt=""></td>
                    <td>
                        <h4>{{ $cartItem->name }}</h4>
                        <p>Size: {{ $cartItem->options->size ?? '' }} </p>
                        <p>Color: {{ $cartItem->options->color ?? '' }} </p>
                    </td>
                    <td class="add_cart_price text-center">&#2547; {{ $cartItem->price }}</td>
                    <td>
                        <div class="quantity_form_input btn-qty">
                            <input data-rowid="{{ $cartItem->rowId }}" type="number" value="{{ $cartItem->qty }}" min="1" max="100" step="1"> 
                        </div>
                    </td>
                    <td class="add_cart_price_total text-center">&#2547; {{$cartItem->total}}</td>
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
                        <li>Sub-Total:<span>Tk {{Cart::subtotal()}}</span></li>
                        <li>Shipping:<span>Tk 50</span></li>
                        <li class="sum_total">Total:<span>Tk {{Cart::total() + 50}}</span></li>
                    </ul> <a href="{{ route('checkout')}}">Continue to Checkout</a> 
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
        <a href="{{ url('/') }}">Retuen Shop</a>
    </div>
</div>
@endif