@extends('layouts.admin')
@section('title', 'Settings')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('contents/admin')}}/plugins/daterangepicker/bootstrap-datepicker.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Settings</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Storefront</h4>
                </div>
                    
                <form action="{{ route('admin.settings') }}" id="update-form" method="post" id="" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#carousel" role="tab">Product Carousel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#add" role="tab">Product Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab" role="tab">Product Tab</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="carousel" role="tabpanel">
                                <h4>Product Carousel -1</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_section_1_title" class="form-control" value="{{ config('settings.product_carousel_section_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_section_1_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -2</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_section_2_title" class="form-control" value="{{ config('settings.product_carousel_section_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_section_2_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -3</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_section_3_title" class="form-control" value="{{ config('settings.product_carousel_section_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_section_3_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -4</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_section_4_title" class="form-control" value="{{ config('settings.product_carousel_section_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_section_4_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="featured" role="tabpanel">
                                <h4>Featured Products</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="featured_product_title" class="form-control" value="{{ config('settings.featured_product_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="featured_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="tab-pane p-3" id="add" role="tabpanel">
                                <h4>Product Add</h4><hr>

                                
                            </div>

                            <div class="tab-pane p-3" id="tab" role="tabpanel">
                                
                                <h4>Product Tab -1</h4><hr>
                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="featured_product_title" class="form-control" value="{{ config('settings.featured_product_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="featured_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Tab -2</h4><hr>

                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="featured_product_title" class="form-control" value="{{ config('settings.featured_product_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="featured_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Tab -3</h4><hr>

                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="featured_product_title" class="form-control" value="{{ config('settings.featured_product_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="featured_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-info waves-effect waves-light">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/select2.init.js"></script>
@endpush
