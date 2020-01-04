@extends('layouts.admin')
@section('title', 'Create Attribute')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.attributes.index') }}">Attributes</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Attribute</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.attributes.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.attributes.store') }}" method="post" id="create-form" class="form-horizontal form-wizard-wrapper">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Attribute Set</label>
                            <select name="attribute_set_id" class="form-control">
                                @foreach($attributesets as $attributeset)
                                <option value="{{ $attributeset->id }}">{{ $attributeset->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" placeholder="e.g. Features">
                        </div>

                        <div class="repeater-custom-show-hide">
                            <div data-repeater-list="values">
                                <div data-repeater-item="">
                                    <div class="form-group row  d-flex align-items-end">                                        
                                        
                                        <div class="col-sm-11">
                                            <label class="control-label">Value</label>
                                            <input type="text" name="values[0][value]" placeholder="e.g. SMS, MMS, Email" class="form-control">
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

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Status</label>
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
    <script src="{{ asset('contents/admin') }}/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="{{ asset('contents/admin') }}/pages/jquery.form-repeater.js"></script>
@endpush