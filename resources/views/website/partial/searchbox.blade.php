@foreach($products as $product)
<li>
    <a href="{{ route('product', $product->slug) }}">
        <div class="d-flex search-product align-items-center">
            <div class="image" style="background-image:url({{ asset($product->image ?? 'contents/admin/images/placeholder.png') }});">
            </div>
            <div class="w-100 overflow--hidden">
                <div class="product-name text-truncate">
                    {{ $product->name }}
                </div>
                <div class="clearfix">
                    <div class="price-box float-left">
                        <span class="product-price strong-600">Tk {{ $product->price }}</span>
                    </div>
                    <div class="stock-box float-right">
                        @if($product->in_stock)
                        <span class="badge badge-success">In stock</span>
                        @else
                        <span class="badge badge-warning">Stock out</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
</li>
@endforeach