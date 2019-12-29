@extends('layouts.admin')
@section('title', $user->name)
@push('css')
    <link href="{{asset('contents/admin')}}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Uers</a></li>
    <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update User</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.users.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.users.update', $user->id) }}" method="post" id="update-form">
                    @method('put')
                    @csrf

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#permissions" role="tab">Permissions</a>
                            </li>
                        </ul>
                         <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" autocomplete="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">User Role</label>
                                    <select class="select2 mb-3 select2-multiple" name="roles[]" multiple="multiple" data-placeholder="Choose Role">
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}"
                                            @foreach($user->roles as $userRole) {{ $role->name == $userRole->name ? 'selected' : '' }}@endforeach
                                        >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single-image">
                                    <div class="image-holder">
                                        @if($user->image)
                                        <img src="{{ asset($user->image->path()) }}" alt="">
                                        @else
                                        <i class="far fa-image"></i>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-3" data-image="single"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
                            </div>
                            <div class="tab-pane p-3" id="permissions" role="tabpanel">
                                <h4>Permissions</h4><hr>
                                @foreach($permissions as $key=>$permission)
                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" id="customCheck{{$key}}" data-parsley-multiple="groups" data-parsley-mincheck="2" value="{{ $permission->id }}" @foreach($user->permissions as $userPermission) @if($userPermission->id == $permission->id) checked @endif @endforeach>
                                        <label class="custom-control-label" for="customCheck{{$key}}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                                @endforeach
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
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/select2/select2.min.js"></script>
    <script>
        ! function(e) {
            "use strict";
            var t = function() {};
            t.prototype.init = function() {
                e(".select2").select2({
                    width: "100%"
                })
            }, e.AdvancedForm = new t, e.AdvancedForm.Constructor = t
        }(window.jQuery),
        function(t) {
            "use strict";
            window.jQuery.AdvancedForm.init()
        }();
    </script>
@endpush
