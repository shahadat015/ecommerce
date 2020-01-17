@extends('layouts.admin')
@section('title', "Create Coupon")
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/flatpickr/flatpickr.min.css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">Coupons</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Coupon</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.coupons.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.coupons.store') }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                   @csrf
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="reviewer_name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Code</label>
                            <input name="reviewer_name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Discount Type</label>
                            <select name="rating" class="form-control">
                                <option value="1">Fixed</option>
                                <option value="2">Percent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Value</label>
                            <input name="reviewer_name" class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="my-3">Start date</label>
                            <input type="text" class="form-control datepicker" name="new_from">
                        </div>

                        <div class="form-group">
                            <label class="my-3">End date</label>
                            <input type="text" class="form-control datepicker" name="new_to">
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_approved" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Allow free shipping</label>
                            </div>
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_approved" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Enable the coupon</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
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
            $(".select2").select2({
                width: "100%"
            });

            $('.datepicker').flatpickr({
                autoclose: true,
            });
        })
    </script>
@endpush
