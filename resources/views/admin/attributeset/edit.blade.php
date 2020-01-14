@extends('layouts.admin')
@section('title', $attributeSet->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.attribute-sets.index') }}">Attribute Sets</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Attribute Sets</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.attribute-sets.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.attribute-sets.update', $attributeSet->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                   @csrf
                   @method('put')
                        
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $attributeSet->name }}">
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" class="custom-control-input" id="customCheck" {{ $attributeSet->status == 1 ? 'selected' : ''}}>
                                <label class="custom-control-label" for="customCheck">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.attribute-sets.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection