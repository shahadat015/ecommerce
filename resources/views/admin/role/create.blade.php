@extends('layouts.admin')
@section('title', 'Create User')
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Create</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Create Role</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.roles.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.roles.store') }}" method="post" id="create-form" class="form-horizontal form-wizard-wrapper">
                    @csrf

                    <div class="card-body">
                    	<h4>General</h4>
                    	<hr>
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Role Name</label>
                            <input name="name" class="form-control" type="text" placeholder="e.g. Admin" value="{{ old('name') }}" >
                        </div>
                        <!--end fieldset-->
                    	<h4>Permissions</h4>
                    	<hr>
                    	@foreach($permissions as $key=>$permission)
                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="permissions[]" class="custom-control-input" id="customCheck{{$key}}" data-parsley-multiple="groups" data-parsley-mincheck="2" value="{{ $permission->id }}">
                                <label class="custom-control-label" for="customCheck{{$key}}">{{ $permission->name }}</label>
                            </div>
                        </div>
                        @endforeach
                        <!--end fieldset-->
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