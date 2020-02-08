<div class="product_page_sidebar">
    <!-- product category -->
    <div class="product_page_category">
        <h4>Categories</h4>
        <ul>
            @foreach($categories as $category)
            <li><a href="{{ route('product.category', $category->slug) }}">{{ $category->name }} <span class="float-right">{{ $category->products()->count() }}</span></a></li>
            @endforeach 
        </ul>
    </div>
    <!-- start product brands -->
    <div class="productpage_brands">
        <h4>BRANDS</h4>
        <ul>
            @foreach($brands as $brand)
                <li><a href="{{ route('product.brand', $brand->slug) }}">{{ $brand->name }} 
                <span>{{ $brand->products()->count() }}</span></a></li>
            @endforeach
        </ul>
    </div>
    <!-- product page marcent -->
    <!-- product page feater product slider -->
    <div class="product_page_feater_product">
        <h4>FEATURED PRODUCTS</h4>
        <div class="product_page_feater_product_slide_active owl-carousel">
            @if($featuredProducts->count() > 3)
            <div class="product_page_feater_product_slide_item">
                <div class="row">
                    @foreach($featuredProducts as $key=>$featuredProduct)
                    <a href="{{ route('product', $featuredProduct->slug) }}">
                        <div class="ppage_iner_slide_item">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                    <div class="product_page_feater_product_slide_item_image">
                                        <img class="img-fluid" src="{{asset($featuredProduct->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                    <div class="product_page_feater_product_s_con">
                                        <h4>{{ str_limit($featuredProduct->name, 20) }}</h4>
                                        <h3>&#2547; {{ $featuredProduct->price }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                        @if($key+1 == 3) @break @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if($featuredProducts->count() > 5)
            <div class="product_page_feater_product_slide_item">
                <div class="row">
                    @foreach($featuredProducts as $key=>$featuredProduct)
                    @if($key+1 < 4) @continue @endif
                    <a href="{{ route('product', $featuredProduct->slug) }}">
                        <div class="ppage_iner_slide_item">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                    <div class="product_page_feater_product_slide_item_image">
                                        <img class="img-fluid" src="{{ asset($featuredProduct->image ?? 'contents/admin/images/placeholder.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                    <div class="product_page_feater_product_s_con">
                                        <h4>{{ str_limit($featuredProduct->name, 20)}}</h4>
                                        <h3>&#2547; {{ $featuredProduct->price }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                        @if($key+1 == 6) @break @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if($featuredProducts->count() > 8)
            <div class="product_page_feater_product_slide_item">
                <div class="row">
                    @foreach($featuredProducts as $key=>$featuredProduct)
                    @if($key+1 < 7) @continue @endif
                    <a href="{{ route('product', $featuredProduct->slug) }}">
                        <div class="ppage_iner_slide_item">
                            <div class="row align-items-center">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                                    <div class="product_page_feater_product_slide_item_image">
                                        <img class="img-fluid" src="{{ asset($featuredProduct->image ?? 'contents/admin/images/placeholder.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                    <div class="product_page_feater_product_s_con">
                                        <h4>{{ str_limit($featuredProduct->name, 20) }}</h4>
                                        <h3>&#2547; {{ $featuredProduct->price }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @if($key+1  == 9) @break @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>