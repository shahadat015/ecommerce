@extends('layouts.admin')
@section('title', $coupon->name)
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.min.css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">Coupon</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Coupon</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.coupons.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                   @csrf
                   @method('put')
                   
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#restrictions" role="tab">Restrictions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#limits" role="tab">Limits</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Name</label>
                                    <input name="name" class="form-control" type="text" value="{{ $coupon->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Code</label>
                                    <input name="code" class="form-control" type="text" value="{{ $coupon->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Discount Type</label>
                                    <select name="is_percent" class="form-control">
                                        <option value="0" {{ $coupon->is_percent == 0 ? 'checked' : '' }}>Fixed</option>
                                        <option value="1" {{ $coupon->is_percent == 1 ? 'checked' : '' }}>Percent</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Value</label>
                                    <input name="value" class="form-control" type="number" value="{{ $coupon->value }}" min="1">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">Start date</label>
                                    <input type="text" value="{{ $coupon->start_date }}" class="form-control datepicker" name="start_date">
                                </div>

                                <div class="form-group">
                                    <label class="my-3">End date</label>
                                    <input type="text" value="{{ $coupon->end_date }}" class="form-control datepicker" name="end_date">
                                </div>

                                <div class="my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="free_shipping" class="custom-control-input" id="customCheck" {{ $coupon->free_shipping == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck">Allow free shipping</label>
                                    </div>
                                </div>

                                <div class="my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1" {{ $coupon->is_active == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Enable the coupon</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="restrictions" role="tabpanel">
                                <h4>Usage Restrictions</h4><hr>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Minimum Spend</label>
                                    <input name="minimum_spend" class="form-control" type="number" value="{{ $coupon->minimum_spend }}" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Maximum Spend</label>
                                    <input name="maximum_spend" class="form-control" type="number" value="{{ $coupon->maximum_spend }}" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Products</label>
                                    <select class="select2 mb-3 select2-multiple select_product" name="products[]" multiple="multiple" data-placeholder="Select Product">
                                        @foreach($coupon->products as $product)
                                        <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Categories</label>
                                    <select class="select2 mb-3 select2-multiple" name="categories[]" multiple="multiple" data-placeholder="Select Product">
                                        @foreach($categories as $key=>$value)
                                        <option value="{{ $key }}" 
                                            @foreach($coupon->categories as $category)
                                                {{ $category->id == $key ? 'selected' : '' }}
                                            @endforeach
                                        >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="limits" role="tabpanel">
                                <h4>Usage Limits</h4><hr>

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Usage Limit Per Coupon</label>
                                    <input name="usage_limit_per_coupon" class="form-control" type="number" value="{{ $coupon->usage_limit_per_coupon }}" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Usage Limit Per Customer</label>
                                    <input name="usage_limit_per_customer" class="form-control" type="number" value="{{ $coupon->usage_limit_per_customer }}" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.coupons.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
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
    <script src="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.js"></script>
    <script>
        $(function () {

            $('.datepicker').flatpickr({
                autoclose: true,
            });

            $(".select2").select2({
                width: "100%",
            });

            $(".select_product").select2({
                width: "100%",
                tags: false,
                multiple: true,
                tokenSeparators: [',', ' '],
                minimumInputLength: 2,
                minimumResultsForSearch: 10,
                ajax: {
                    url: '{{ route("admin.getProducts") }}',
                    dataType: "json",
                    type: "GET",
                    data: function (params) {

                        var queryParameters = {
                            term: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        })
    </script>
@endpush
