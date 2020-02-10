<div class="title">Products</div>
<ul>
    @foreach($products as $product)
    <li>
        <a href="{{ route('product', $product->slug) }}">
            <div class="d-flex search-product align-items-center">
                <div class="image" style="background-image:url({{ asset($product->image) }});">
                </div>
                <div class="w-100 overflow--hidden">
                    <div class="product-name text-truncate">
                        {{ $product->name }}
                    </div>
                    <div class="clearfix">
                        <div class="price-box float-left">
                            <span class="product-price strong-600">{{ $product->price }}</span>
                        </div>
                        <div class="stock-box float-right">
                            <span class="badge bg-green">{{ $product->in_stock ? 'In stock' : 'Out of stock' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </li>
    @endforeach
</ul>