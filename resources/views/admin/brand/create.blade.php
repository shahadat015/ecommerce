@extends('layouts.admin')
@section('title', 'Create Brand')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">Brand</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Brand</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.brands.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.brands.store') }}" method="post" id="create-form" class="form-horizontal form-wizard-wrapper">
                   @csrf
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Brand Name</label>
                            <input name="name" class="form-control" type="text" placeholder="e.g. Nike">
                        </div>
                        
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Tagline</label>
                            <input name="tagline" class="form-control" type="text" placeholder="e.g. Just Do It">
                        </div>

                        <div class="single-image">
                            <div class="image-holder">
                                <i class="far fa-image"></i>
                            </div>
                        </div>

                        <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-3" data-image="single"><i class="far fa-folder-open mr-2"></i> Browse Image</button>

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
    @include('admin.image.modal')
    <!-- end row -->
@endsection