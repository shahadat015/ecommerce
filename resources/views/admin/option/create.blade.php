@extends('layouts.admin')
@section('title', 'Create Option')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.options.index') }}">Options</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Option</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.options.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.options.store') }}" method="post" id="create-form" class="form-horizontal form-wizard-wrapper">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" placeholder="e.g. Size">
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="dropdown">Dropdown</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio Button</option>
                                <option value="multiple_select">Multiple Select</option>
                            </select>
                        </div>


                        <div class="repeater-custom-show-hide">
                            <div data-repeater-list="values">
                                <div data-repeater-item="">
                                    <div class="form-group row  d-flex align-items-end">                                        
                                        
                                        <div class="col-sm-4">
                                            <label class="control-label">Label</label>
                                            <input type="text" name="values[0][label]" placeholder="e.g. S, M, L" class="form-control">
                                        </div><!--end col-->

                                        <div class="col-sm-4">
                                            <label class="control-label">Price</label>
                                            <input type="text" name="values[0][price]" placeholder="e.g. Tk 100" class="form-control">
                                        </div><!--end col-->

                                        <div class="col-sm-3">
                                            <label class="control-label">Price Type</label>
                                            <select name="values[0][price_type]" class="form-control">
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

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">This option is required</label>
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