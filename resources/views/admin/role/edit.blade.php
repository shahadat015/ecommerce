@extends('layouts.admin')
@section('title', $role->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">edit</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Edit Role</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.roles.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.roles.update', $role->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                    <div class="card-body">
                        @method('put')
                    	@csrf
                        <fieldset>
                        	<h4>General</h4>
                        	<hr>
                            <div class="form-group">
                                <label for="example-email-input1" class="col-form-label">Role Name</label>
                                <div class="">
                                    <input name="name" class="form-control" type="text" placeholder="Author" value="{{ $role->name }}" required>
                                </div>
                            </div>
                        </fieldset>
                        <!--end fieldset-->
                        <fieldset>
                        	<h4>Permissions</h4>
                        	<hr>
                        	@foreach($permissions as $key=>$permission)
                            <div class="form-check-inline my-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" class="custom-control-input" id="customCheck{{$key}}" data-parsley-multiple="groups" data-parsley-mincheck="2" value="{{ $permission->id }}" @foreach($role->permissions as $rolePermission) @if($rolePermission->id == $permission->id) checked @endif @endforeach>
                                    <label class="custom-control-label" for="customCheck{{$key}}">{{ $permission->name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </fieldset>
                        <!--end fieldset-->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-submit waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection