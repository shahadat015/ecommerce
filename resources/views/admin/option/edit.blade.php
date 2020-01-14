@extends('layouts.admin')
@section('title', $option->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.options.index') }}">Options</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Option</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.options.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.options.update', $option->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                    <div class="card-body">
                    	@csrf
                        @method('put')

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $option->name }}">
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="dropdown" {{ $option->type == 'dropdown' ? 'selected' : '' }}>Dropdown</option>
                                <option value="checkbox" {{ $option->type == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                <option value="radio" {{ $option->type == 'radio' ? 'selected' : '' }}>Radio Button</option>
                                <option value="multiple_select" {{ $option->type == 'multiple_select' ? 'selected' : '' }}>Multiple Select</option>
                            </select>
                        </div>


                        <div class="repeater-custom-show-hide">
                            <div data-repeater-list="values">
                                @foreach($option->values as $value)
                                <div data-repeater-item="">
                                    <div class="form-group row  d-flex align-items-end">                                        
                                        
                                        <div class="col-sm-4">
                                            <label class="control-label">Label</label>
                                            <input type="text" name="label" class="form-control" value="{{ $value->label }}">
                                        </div><!--end col-->

                                        <div class="col-sm-4">
                                            <label class="control-label">Price</label>
                                            <input type="text" name="price" class="form-control" value="{{ $value->price }}">
                                        </div><!--end col-->

                                        <div class="col-sm-3">
                                            <label class="control-label">Price Type</label>
                                            <select name="price_type" class="form-control">
                                                <option value="fixed" {{ $value->price_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                                <option value="percent" {{ $value->price_type == 'fixed' ? 'percent' : '' }}>Percent</option>
                                            </select>
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
                                <input type="checkbox" name="status" class="custom-control-input" id="customCheck" {{ $option->is_required == 1 ? 'selected' : ''}}>
                                <label class="custom-control-label" for="customCheck">This option is required</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.options.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
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