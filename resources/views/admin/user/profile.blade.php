@extends('layouts.admin')
@section('title', $user->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Uers</a></li>
    <li class="breadcrumb-item active">Show</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        @if($user->image)
                                        <img src="{{ asset($user->image) }}" alt="" class="rounded-circle" width="120">
                                        @else
                                        <img src="{{ asset('contents/admin/images/users/avatar.png') }}" alt="" class="rounded-circle" width="120">
                                        @endif
                                        <span class="fro-profile_main-pic-change"><i class="fas fa-camera"></i></span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name">{{ $user->name }}</h5>
                                        <p class="mb-0 met-user-name-post">
                                            @foreach($user->roles as $role) 
                                                {{ $role->name }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 ml-auto mt-4">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b>Phone </b>: {{ $user->phone ?? 'No Number' }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b>Email </b>: {{ $user->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Address</b> : {{ $user->address ?? "No Address" }}</li>
                                </ul>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end f_profile-->
                </div>
                <!--end card-body-->
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12 col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form id="update-form" class="form-horizontal form-material mb-0" accept="{{ route('admin.user.profile') }}" method="post">
                                @csrf
                                @method('put')

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Phone No" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" name="password" placeholder="password" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" name="password_confirmation" placeholder="Re-password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">                 
                                    <input type="text" name="address" placeholder="Address" class="form-control" value="{{ $user->address }}">
                                </div>
                                <div class="form-group">
                                    <div class="single-image">
                                        <div class="image-holder">
                                            @if($user->image)
                                            <img src="{{ asset($user->image) }}" alt="">
                                            @else
                                            <i class="far fa-image"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light image-picker waves-effect waves-light d-block mt-3 mb-3" data-image="single"><i class="far fa-folder-open mr-2"></i> Browse Image</button>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    @include('admin.image.modal')
@endsection