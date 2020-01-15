@extends('layouts.admin')
@section('title', $product->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
		<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Show</li>
    @endcomponent
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Show Product</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.products.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            @if($product->image)
                            <img src="{{ asset($product->image->path()) }}" alt="" class="mx-auto d-block" height="330" width="450">
                            @else
                            <img src="{{ asset('contents/admin/images/placeholder.png') }}" alt="" class="mx-auto d-block" height="330" width="450">
                            @endif
                        </div>
                        <!--end col-->
                        <div class="col-lg-6 align-self-center">
                            <div class="single-pro-detail">
                                <p class="mb-1">{{ $product->sku ?? "PRODUCT SKU" }}</p>
                                <div class="custom-border mb-3"></div>
                                <h3 class="pro-title">{{ $product->name }}</h3>
                                <p class="text-muted mb-0">{{ $product->short_description ?? "Product short description" }}</p>
                                <ul class="list-inline mb-2 product-review">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                    <li class="list-inline-item">4.5 (30 reviews)</li>
                                </ul>
                                @if($product->special_price_end > now())
                                    <h2 class="pro-price">Tk {{ $product->special_price }} <span><del>Tk {{ $product->price }}</del></span><small class="text-danger font-weight-bold ml-2">{{ round((($product->price - $product->special_price) / $product->price) * 100) }}%</small></h2>
                                @else
                                    <h2 class="pro-price">Tk {{ $product->price }}</h2>
                                @endif
                                <h6 class="text-muted font-13">Features :</h6>
                                <ul class="list-unstyled pro-features border-0">
                                    @foreach($product->attributes as $productAttribute)
                                    <li>{{ $productAttribute->attribute->name }} : @foreach($productAttribute->values as $attributeValue) {{ $attributeValue->value }} @endforeach</li>
                                    @endforeach
                                </ul>
                                @foreach($product->options as $productOption)
                                <h6 class="text-muted font-13 d-inline-block align-middle mr-2 mt-0">{{ $productOption->name }} :</h6>
                                    @foreach($productOption->values as $key=>$optionValue)
                                    <div class="radio2 radio-info2 form-check-inline ml-2">
                                        <input type="radio" id="inlineRadio{{ $optionValue->id }}" value="{{ $optionValue->label }}" name="{{ $productOption->name }}" @if($key == 0) checked @endif >
                                        <label for="inlineRadio{{ $optionValue->id }}" class="mb-0">{{ $optionValue->label }}</label>
                                    </div>
                                    @endforeach
                                @endforeach
                                <!-- <div class="quantity mt-3">
                                    <input class="form-control" type="number" min="0" value="0" id="example-number-input"> <a href="#" class="btn btn-primary text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>Add to Cart</a>
                                </div> -->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="pro-order-box"><i class="mdi mdi-truck-fast text-success"></i>
                                <h4 class="header-title">Fast Delivery</h4>
                                <p class="text-muted mb-0">It is a long established fact that a reader will be distracted. Contrary to popular belief.</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                            <div class="pro-order-box"><i class="mdi mdi-refresh text-danger"></i>
                                <h4 class="header-title">Returns in 30 Days</h4>
                                <p class="text-muted mb-0">It is a long established fact that a reader will be distracted. Contrary to popular belief.</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                            <div class="pro-order-box"><i class="mdi mdi-headset text-warning"></i>
                                <h4 class="header-title">Online Support 24/7</h4>
                                <p class="text-muted mb-0">It is a long established fact that a reader will be distracted. Contrary to popular belief.</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                            <div class="pro-order-box mb-0"><i class="mdi mdi-wallet text-purple"></i>
                                <h4 class="header-title">Secure Payment</h4>
                                <p class="text-muted mb-0">It is a long established fact that a reader will be distracted. Contrary to popular belief.</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-md-9">
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 align-self-center"><img src="{{asset('contents/admin')}}/images/products/2.jpg" alt="" height="250" class="d-block mx-auto"></div>
                        <div class="col-lg-9"><span class="bg-soft-danger rounded-pill px-3 py-1 font-weight-bold">Metrica</span>
                            <h5 class="mt-3">It is a long established fact that a reader will be distracted</h5>
                            <p class="text-muted mb-4">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>It is a long established fact that a reader will be distracted.</li>
                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>Contrary to popular belief, Lorem Ipsum is not text.</li>
                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>There are many variations of passages of Lorem.</li>
                                <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>It is a long established fact that a reade.</li>
                            </ul>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-white-balance-sunny text-warning"></i>
                                        <h4 class="header-title">Seff from Sunlight</h4>
                                        <p class="text-muted mb-0">It is a long established fact that a reader.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-fire text-danger"></i>
                                        <h4 class="header-title">Not Seff from Fire</h4>
                                        <p class="text-muted mb-0">There are many variations of passages of.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-glass-wine text-success"></i>
                                        <h4 class="header-title">Seff from liqvid</h4>
                                        <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is .</p>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="review-box text-center align-item-center">
                        <h1>4.8</h1>
                        <h4 class="header-title">Overall Rating</h4>
                        <ul class="list-inline mb-0 product-review">
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                            <li class="list-inline-item"><small class="text-muted">Total Review (700)</small></li>
                        </ul>
                    </div>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><span class="text-info">5 Star</span> <small class="float-right text-muted ml-3 font-14">593</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%; border-radius:5px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li class="mb-2"><span class="text-info">4 Star</span> <small class="float-right text-muted ml-3 font-14">99</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 18%; border-radius:5px;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li class="mb-2"><span class="text-info">3 Star</span> <small class="float-right text-muted ml-3 font-14">6</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 10%; border-radius:5px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li class="mb-2"><span class="text-info">2 Star</span> <small class="float-right text-muted ml-3 font-14">2</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 1%; border-radius:5px;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li><span class="text-info">1 Star</span> <small class="float-right text-muted ml-3 font-14">0</small>
                            <div class="progress mt-2" style="height:5px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%; border-radius:5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!--end row-->
@endsection