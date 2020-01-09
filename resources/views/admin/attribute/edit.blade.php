@extends('layouts.admin')
@section('title', $attribute->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.attributes.index') }}">Attributes</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Attribute</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.attributes.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                    <div class="card-body">
                    	@csrf
                        @method('put')

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Attribute Set</label>
                            <select name="attribute_set_id" class="form-control">
                                @foreach($attributesets as $attributeset)
                                <option value="{{ $attributeset->id }}" {{ $attribute->attribute_set_id == $attributeset->id ? 'selected' : ' ' }}>{{ $attributeset->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $attribute->name }}">
                        </div>

                        <div class="repeater-custom-show-hide">
                            <div data-repeater-list="values">
                                @foreach($attribute->values as $value)
                                <div data-repeater-item="">
                                    <div class="form-group row  d-flex align-items-end">                                        
                                        
                                        <div class="col-sm-11">
                                            <label class="control-label">Value</label>
                                            <input type="text" name="value" class="form-control" value="{{ $value->value }}">
                                        </div><!--end col-->

                                        <div class="col-sm-1">
                                            <span data-repeater-delete="" class="btn btn-danger">
                                                <span class="far fa-trash-alt"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-group mb-2">
                                <span data-repeater-create="" class="btn btn-light btn-md">
                                    <span class="fa fa-plus"></span> Add Value
                                </span>
                            </div>
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" class="custom-control-input" id="customCheck" {{ $attribute->status == 1 ? 'selected' : ''}}>
                                <label class="custom-control-label" for="customCheck">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
                        <a href="{{ route('admin.attributes.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{ asset('contents/admin') }}/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="{{ asset('contents/admin') }}/pages/jquery.form-repeater.js"></script>
@endpush