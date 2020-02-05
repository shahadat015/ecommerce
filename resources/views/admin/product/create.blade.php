@extends('layouts.admin')
@section('title', 'Create Product')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.min.css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Product</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.products.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.products.store') }}" id="create-form" method="post" id="" class="form-horizontal form-wizard-wrapper">
                    @csrf

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#price" role="tab">Price</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#image" role="tab">Image</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#inventory" role="tab">Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#seo" role="tab">SEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#attributes" role="tab">Attributes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#options" role="tab">Options</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#additionals" role="tab">Additionals</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="name">Name<b class="text-danger">*</b></label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Description<b class="text-danger">*</b></label>
                                    <textarea id="elm1" name="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Categories</label>
                                    <select class="select2 mb-3 select2-multiple" name="categories[]" multiple="multiple" data-placeholder="Select Category">
                                        @foreach($categories as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Brand</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" >
                                        <label class="custom-control-label" for="customCheck1">Publish the product</label>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane p-3" id="price" role="tabpanel">
                                <h4>Price</h4><hr>

                                <div class="form-group">
                                    <label for="name">Price<b class="text-danger">*</b></label>
                                    <input type="number" min="1" name="price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Special Price</label>
                                    <input type="number" min="1" name="special_price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Special Price Start</label>
                                    <input type="text" class="form-control datepicker" name="special_price_start">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Special Price End</label>
                                    <input type="text" class="form-control datepicker" name="special_price_end">
                                </div>
                            </div>
                            
                            <div class="tab-pane p-3" id="image" role="tabpanel">
                                <h4>Main Image</h4><hr>
                                <div class="single-image">
                                    <div class="image-holder">
                                        <i class="far fa-image"></i>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-4" data-image="single" data-name="image"><i class="far fa-folder-open mr-2"></i> Browse Image</button>

                                <h4>Additional Images</h4><hr>
                                <div class="multiple-images">
                                    <div class="image-list">
                                        <div class="image-holder placeholder">
                                            <i class="far fa-image"></i>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-3" data-image="multiple" data-name="images[]"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
                            </div>

                            <div class="tab-pane p-3" id="inventory" role="tabpanel">
                                <h4>Inventory</h4><hr>

                                <div class="form-group">
                                    <label for="name">SKU</label>
                                    <input type="text" name="sku" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Inventory Management</label>
                                    <select name="manage_stock" class="form-control" id="manage-stock">
                                        <option value="0">Don't Track Inventory</option>
                                        <option value="1">Track Inventory</option>
                                    </select>
                                </div>

                                <div class="form-group d-none" id="qty">
                                    <label for="name">Quantity<b class="text-danger">*</b></label>
                                    <input type="text" name="qty" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Stock Availability</label>
                                    <select name="in_stock" class="form-control">
                                        <option value="0">In Stock</option>
                                        <option value="1">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="seo" role="tabpanel">
                                <h4>SEO</h4><hr>

                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="attributes" role="tabpanel">
                                <h4>Attributes</h4><hr>
                                <div class="repeater-attribute">
                                    <div data-repeater-list="attribute">
                                        <div data-repeater-item="">
                                            <div class="form-group row  d-flex align-items-end"> 

                                                <div class="col-sm-3">
                                                    <label class="control-label">Attribute<b class="text-danger">*</b></label>
                                                    <select class="form-control custom-select attributes" name="attribute_id" style="width: 100%; height:36px;">
                                                        <option value="">Select Attribute</option>
                                                        @foreach($attributesets as $attributeset)
                                                        <optgroup label="{{ $attributeset->name }}">
                                                            @foreach($attributeset->attributes as $attribute)
                                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div><!--end col-->                                       
                                                
                                                <div class="col-sm-8">
                                                    <label class="control-label">Value<b class="text-danger">*</b></label>
                                                    <select class="select2 mb-3 select2-multiple" name="attribute_value_id" multiple="multiple">
                                                    </select>
                                                </div><!--end col-->

                                                <div class="col-sm-1">
                                                    <span data-repeater-delete="" class="btn btn-danger">
                                                        <span class="far fa-trash-alt"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <span data-repeater-create="" class="btn btn-light btn-md">
                                            <span class="fa fa-plus"></span> Add Value
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="options" role="tabpanel">
                                <h4>Options</h4><hr>

                                <div class="repeater-custom-show-hide repeater-option">
                                    <div data-repeater-list="options" class="option">
                                        <div data-repeater-item="" class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="example-email-input1" class="col-form-label">Name<b class="text-danger">*</b></label>
                                                        <input name="name" class="form-control" type="text">
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="example-email-input1" class="col-form-label">Type<b class="text-danger">*</b></label>
                                                        <select name="type" class="form-control">
                                                            <option value="dropdown">Dropdown</option>
                                                            <option value="checkbox">Checkbox</option>
                                                            <option value="radio">Radio Button</option>
                                                            <option value="multiple_select">Multiple Select</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <label for="example-email-input1" class="col-form-label">Is Required?<b class="text-danger">*</b></label>
                                                        <select name="is_required" class="form-control">
                                                            <option value="1">Required</option>
                                                            <option value="0">Not Required</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-1 mt-4 pt-2">
                                                        <span data-repeater-delete="" class="btn btn-danger">
                                                            <span class="far fa-trash-alt"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="repeater-custom-show-hide-inner">
                                                    <div data-repeater-list="values">
                                                        <div data-repeater-item="">
                                                            <div class="form-group row  d-flex align-items-end">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Label<b class="text-danger">*</b></label>
                                                                    <input type="text" name="label" class="form-control">
                                                                </div><!--end col-->

                                                                <div class="col-sm-4">
                                                                    <label class="control-label">Price<b class="text-danger">*</b></label>
                                                                    <input type="text" name="price" class="form-control">
                                                                </div><!--end col-->

                                                                <div class="col-sm-3">
                                                                    <label class="control-label">Price Type<b class="text-danger">*</b></label>
                                                                    <select name="price_type" class="form-control">
                                                                        <option value="fixed">Fixed</option>
                                                                        <option value="percent">Percent</option>
                                                                    </select>
                                                                </div><!--end col-->

                                                                <div class="col-sm-1">
                                                                    <span data-repeater-delete="" class="btn btn-danger">
                                                                        <span class="far fa-trash-alt"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <span data-repeater-create="" class="btn btn-light btn-md">
                                                            <span class="fa fa-plus"></span> Add Value
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group mb-2 row">
                                        <div class="col-3">
                                            <span data-repeater-create="" class="btn btn-light btn-md">
                                                <span class="fa fa-plus"></span> Add Option
                                            </span>
                                        </div>
                                        <div class="col-3">
                                            <select id="option" class="form-control">
                                                @foreach($options as $option)
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-light btn-md" id="btn-global" type="button">
                                                <i class="fa fa-plus"></i> Add Global Option
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="additionals" role="tabpanel">
                                <h4>Additionals</h4><hr>

                                <div class="form-group">
                                    <label for="name">Short Description</label>
                                    <textarea name="short_description" class="form-control" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Product New From</label>
                                    <input type="text" class="form-control datepicker" name="new_from">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Product New To</label>
                                    <input type="text" class="form-control datepicker" name="new_to">
                                </div>

                                <div class="form-group">
                                    <label for="name">Related Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="products[]" multiple="multiple" data-placeholder="Select Product">
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
    @include('admin.image.modal')
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/tinymce/tinymce.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('contents/admin') }}/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.js"></script>
    <script src="{{asset('contents/admin')}}/pages/jquery.form-editor.init.js"></script>
    <script src="{{ asset('contents/admin') }}/pages/jquery.form-repeater.js"></script>
    <script src="{{asset('contents/admin')}}/js/flatpickr.init.js"></script>
    <script src="{{asset('contents/admin')}}/js/select2.init.js"></script>
    <script src="{{asset('contents/admin')}}/js/product.js"></script>
@endpush
