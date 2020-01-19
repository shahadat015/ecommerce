@extends('layouts.admin')
@section('title', $role->name)
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
@endpush
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
                    @method('put')
                    @csrf
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Role Name</label>
                            <div class="">
                                <input name="name" class="form-control" type="text" placeholder="Author" value="{{ $role->name }}" required>
                            </div>
                        </div>
                        <!--end fieldset-->
                        <div class="form-group">
                            <label for="name">Permissions</label>
                            <select class="select2 mb-3 select2-multiple" name="permissions[]" multiple="multiple" data-placeholder="Select Permission">
                                @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}" 
                                    @foreach($role->permissions as $rolePermission) 
                                        {{ $permission->id == $rolePermission->id ? 'selected' : '' }}
                                    @endforeach>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/select2.init.js"></script>
@endpush
