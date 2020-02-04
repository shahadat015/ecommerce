@extends('layouts.admin')
@section('title', 'Settings')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
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
                    
                <form action="{{ route('admin.storefront.sections') }}" id="update-form" method="post" id="" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#features" role="tab">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#carousel" role="tab">Product Carousel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#banner1" role="tab">Banner Section 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#banner2" role="tab">Banner Section 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab" role="tab">Product Tab</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="features" role="tabpanel">
                                <h4>Features -1</h4><hr>
                                <div class="form-group">
                                    <label for="name">Icon</label>
                                    <input type="text" name="product_features_1_icon" class="form-control" value="{{ config('settings.product_features_1_icon') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="product_features_1_title" class="form-control" value="{{ config('settings.product_features_1_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Subtitle</label>
                                    <input type="text" name="product_features_1_subtitle" class="form-control" value="{{ config('settings.product_features_1_subtitle') }}">
                                </div>

                                <h4>Features -2</h4><hr>
                                <div class="form-group">
                                    <label for="name">Icon</label>
                                    <input type="text" name="product_features_2_icon" class="form-control" value="{{ config('settings.product_features_2_icon') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="product_features_2_title" class="form-control" value="{{ config('settings.product_features_2_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Subtitle</label>
                                    <input type="text" name="product_features_2_subtitle" class="form-control" value="{{ config('settings.product_features_2_subtitle') }}">
                                </div>

                                <h4>Features -3</h4><hr>
                                <div class="form-group">
                                    <label for="name">Icon</label>
                                    <input type="text" name="product_features_3_icon" class="form-control" value="{{ config('settings.product_features_3_icon') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="product_features_3_title" class="form-control" value="{{ config('settings.product_features_3_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Subtitle</label>
                                    <input type="text" name="product_features_3_subtitle" class="form-control" value="{{ config('settings.product_features_3_subtitle') }}">
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="carousel" role="tabpanel">
                                <h4>Product Carousel -1</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_1_title" class="form-control" value="{{ config('settings.product_carousel_1_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_1_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -2</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_2_title" class="form-control" value="{{ config('settings.product_carousel_2_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_2_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -3</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_3_title" class="form-control" value="{{ config('settings.product_carousel_3_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_3_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Carousel -4</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="product_carousel_4_title" class="form-control" value="{{ config('settings.product_carousel_4_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_carousel_4_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="featured" role="tabpanel">
                                <h4>Featured Product</h4><hr>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="featured_product_image">
                                            <div class="image-holder">
                                                @if(config('settings.featured_product_image'))
                                                <img src="{{ asset(config('settings.featured_product_image')) }}">
                                                <input type="hidden" name="featured_product_image" value="{{ config('settings.featured_product_image') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="example-email-input1" class="col-form-label">Title</label>
                                                <input name="featured_product_title" class="form-control" type="text" value="{{ config('settings.featured_product_title') }}">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="example-email-input1" class="col-form-label">Subtitle</label>
                                                <input name="featured_product_subtitle" class="form-control" type="text" value="{{ config('settings.featured_product_subtitle') }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label">Button Text</label>
                                                <input type="text" name="featured_product_cta_text" class="form-control" value="{{ config('settings.featured_product_cta_text') }}">
                                            </div><!--end col-->

                                            <div class="col-sm-4">
                                                <label class="control-label">Button URL</label>
                                                <input type="text" name="featured_product_cta_url" class="form-control" value="{{ config('settings.featured_product_cta_url') }}">
                                            </div><!--end col-->

                                            <div class="col-sm-4">
                                                <label class="control-label">Open In</label>
                                                <select name="featured_product_open_in" class="form-control">
                                                    <option value="_blank">Open in new tab</option>
                                                    <option value="_self">Load in current tab</option>
                                                </select>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <h4>Featured Products</h4><hr>
                                <div class="form-group">
                                    <label for="name">Section Title</label>
                                    <input type="text" name="featured_products_title" class="form-control" value="{{ config('settings.featured_products_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="featured_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="banner1" role="tabpanel">
                                <h4>Banner Section -1</h4><hr>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_1_image_1">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_1_image_1'))
                                                <img src="{{ asset(config('settings.banner_section_1_image_1')) }}">
                                                <input type="hidden" name="banner_section_1_image_1" value="{{ config('settings.banner_section_1_image_1') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_1_cta_1_url" class="form-control" value="{{ config('settings.banner_section_1_cta_1_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_1_cta_1_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_1_image_2">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_1_image_2'))
                                                <img src="{{ asset(config('settings.banner_section_1_image_2')) }}">
                                                <input type="hidden" name="banner_section_1_image_2" value="{{ config('settings.banner_section_1_image_2') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_1_cta_2_url" class="form-control" value="{{ config('settings.banner_section_1_cta_2_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_1_cta_2_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_1_image_3">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_1_image_3'))
                                                <img src="{{ asset(config('settings.banner_section_1_image_3')) }}">
                                                <input type="hidden" name="banner_section_1_image_3" value="{{ config('settings.banner_section_1_image_3') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_1_cta_3_url" class="form-control" value="{{ config('settings.banner_section_1_cta_3_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_1_cta_3_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_1_image_4">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_1_image_4'))
                                                <img src="{{ asset(config('settings.banner_section_1_image_4')) }}">
                                                <input type="hidden" name="banner_section_1_image_4" value="{{ config('settings.banner_section_1_image_4') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_1_cta_4_url" class="form-control" value="{{ config('settings.banner_section_1_cta_4_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_1_cta_4_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="banner2" role="tabpanel">
                                <h4>Banner Section -2</h4><hr>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_2_image_1">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_2_image_1'))
                                                <img src="{{ asset(config('settings.banner_section_2_image_1')) }}">
                                                <input type="hidden" name="banner_section_2_image_1" value="{{ config('settings.banner_section_2_image_1') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_2_cta_1_url" class="form-control" value="{{ config('settings.banner_section_2_cta_1_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_2_cta_1_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_2_image_2">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_2_image_2'))
                                                <img src="{{ asset(config('settings.banner_section_2_image_2')) }}">
                                                <input type="hidden" name="banner_section_2_image_2" value="{{ config('settings.banner_section_2_image_2') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_2_cta_2_url" class="form-control" value="{{ config('settings.banner_section_2_cta_2_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_2_cta_2_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_2_image_3">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_2_image_3'))
                                                <img src="{{ asset(config('settings.banner_section_2_image_3')) }}">
                                                <input type="hidden" name="banner_section_2_image_3" value="{{ config('settings.banner_section_2_image_3') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_2_cta_3_url" class="form-control" value="{{ config('settings.banner_section_2_cta_3_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_2_cta_3_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 py-2">
                                        <div class="single-image image-picker" data-image="slider" data-name="banner_section_2_image_4">
                                            <div class="image-holder">
                                                @if(config('settings.banner_section_2_image_4'))
                                                <img src="{{ asset(config('settings.banner_section_2_image_4')) }}">
                                                <input type="hidden" name="banner_section_2_image_4" value="{{ config('settings.banner_section_2_image_4') }}">
                                                @else
                                                <i class="far fa-image"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Call to Action URL</label>
                                                    <input type="text" name="banner_section_2_cta_4_url" class="form-control" value="{{ config('settings.banner_section_2_cta_4_url') }}">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Open In</label>
                                                    <select name="banner_section_2_cta_4_open_in" class="form-control">
                                                        <option value="_blank">Open in new tab</option>
                                                        <option value="_self">Load in current tab</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="tab" role="tabpanel">
                                <h4>Product Tab -1</h4><hr>
                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="product_tab_1_title" class="form-control" value="{{ config('settings.product_tab_1_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_tab_1_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Tab -2</h4><hr>

                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="product_tab_2_title" class="form-control" value="{{ config('settings.product_tab_2_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_tab_2_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>

                                <h4>Product Tab -3</h4><hr>

                                <div class="form-group">
                                    <label for="name">Tab Title</label>
                                    <input type="text" name="product_tab_3_title" class="form-control" value="{{ config('settings.product_tab_3_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Tab Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="product_tab_3_products[]" multiple="multiple" data-placeholder="Select Product">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    @include('admin.image.modal')
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/select2.init.js"></script>
@endpush
