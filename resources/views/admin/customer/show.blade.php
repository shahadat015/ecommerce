@extends('layouts.admin')
@section('title', $user->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Uers</a></li>
    <li class="breadcrumb-item active">Show</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Show User</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.users.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                <div class="card-body met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        @if($user->image)
                                        <img src="{{ asset($user->image->path()) }}" alt="" class="rounded-circle" width="120">
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
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row">
                <div class="col-lg-12 col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion" id="accordionExample-faq">
                                <div class="card shadow-none border mb-1">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="my-0"><button class="btn btn-link ml-4" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Frogetor?</button></h5></div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample-faq">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                    </div>
                                </div>
                                <div class="card shadow-none border mb-1">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="my-0"><button class="btn btn-link collapsed ml-4 align-self-center" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How buy Frogetor on coin?</button></h5></div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample-faq">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</div>
                                    </div>
                                </div>
                                <div class="card shadow-none border mb-1">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="my-0"><button class="btn btn-link collapsed ml-4" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What cryptocurrency can i use to buy Frogetor?</button></h5></div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample-faq">
                                        <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end col-->
    </div>
    @include('admin.image.modal')
@endsection