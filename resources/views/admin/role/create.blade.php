@extends('layouts.admin')
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/jquery-steps/jquery.steps.css" rel="stylesheet" type="text/css">
@endpush
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
                    
                <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="post" id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                    	@csrf

                        <h3>General</h3>
                        <fieldset>
                        	<h4>General</h4>
                        	<hr>
                            <div class="form-group">
                                <label for="example-email-input1" class="col-form-label">Role Name</label>
                                <input name="name" class="form-control" type="text" placeholder="e.g. Admin" value="{{ old('name') }}">
                            </div>
                        </fieldset>
                        <!--end fieldset-->
                        <h3>Permissions</h3>
                        <fieldset>
                        	<h4>Permissions</h4>
                        	<hr>
                        	@foreach($permissions as $key=>$permission)
                            <div class="form-group row">
                                <div class="col-sm-12 ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="horizontalCheckbox{{$key}}" data-parsley-multiple="groups" data-parsley-mincheck="2" value="{{ $permission->id }}">
                                        <label class="custom-control-label" for="horizontalCheckbox{{$key}}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </fieldset>
                        <!--end fieldset-->
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/jquery-steps/jquery.steps.min.js"></script>
    <script src="{{asset('contents/admin')}}/pages/jquery.form-wizard.init.js"></script>
    <script>
    	$(function() {
    		$(document).on('click', 'a[href="#finish"]', function () {
	    		$('#form-horizontal').submit();
	    	});
    	})
    </script>
@endpush