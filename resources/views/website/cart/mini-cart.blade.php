<div class="row mini-cart px-3">
    @forelse(Cart::content() as $cartItem)
    <div class="mini_cart_item">
        <div class="row">
            <div class="col-4 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="mini_cart_image">
                    <img class="img-fluid" src="{{ asset($cartItem->options->image) }}" alt="cart">
                </div>
            </div>
            <div class="col-8 col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="mini_cart_content">
                    <h4>{{ str_limit($cartItem->name, 20) }}</h4>
                    <p>{{ $cartItem->qty}} × {{ $cartItem->price }}</p>
                    <a class="removefromcart" href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-md-12 text-center">
        <p>There are no items in this cart</p>
    </div>
    @endforelse
    @if(Cart::count() > 0)
    <div class="min_cart_button_bottom text-center">
        <a href="{{ route('cart') }}">View Cart</a>
        <a href="{{ route('checkout') }}" class="min_cart_btn_sp">Check Out</a>
    </div>
    @endif
</div>