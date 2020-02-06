@extends('layouts.admin')
@section('title', $message->subject)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.messages.index') }}">Message</a></li>
        <li class="breadcrumb-item active">Show</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Contact Message</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.messages.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                <div class="card-body">
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle thumb-md" src="{{ asset('contents/admin/images/users/avatar.png') }}" alt="">
                        <div class="media-body align-self-center">
                            <h4 class="font-14 m-0">{{ $message->name }}</h4>
                            <small class="text-muted">{{ $message->email }}</small>
                        </div>
                    </div>
                    <h4 class="mt-0">{{ $message->subject }}</h4>
                    <p>Dear Admin,</p>
                    <p>{{ $message->message }}</p>
                    <p>Sincerly,</p>
                    <h5 class="font-14 m-0">{{ $message->name }}</h5>
                    <hr>
                    <a href="#custom-modal" class="btn btn-soft-primary waves-effect" data-toggle="modal" data-animation="bounce" data-target=".compose-modal"><i class="mdi mdi-reply"></i> Reply</a> <a href="#" class="btn btn-soft-primary waves-effect">Forward <i class="mdi mdi-share"></i></a></div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection