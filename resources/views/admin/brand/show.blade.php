@extends('layouts.admin')
@section('title', $brand->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
		<li class="breadcrumb-item"><a href="{{ url('admin.brands.index') }}">Brands</a></li>
        <li class="breadcrumb-item active">Show</li>
    @endcomponent
    <!--end row-->
    <div class="row justify-content-center">
        <div class="col-8">
             <div class="card card-border">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left"> {{ $brand->name }} </h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.brands.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                @if($brand->image)
                <img class="card-img-top img-fluid" src="{{ asset($brand->image->path()) }}" alt="Card image cap">
                @else
                <img class="card-img-top img-fluid" src="{{ asset('contents/admin/images/placeholder.png') }}" alt="Card image cap">
                @endif
                <div class="card-body">
                    <h4 class="card-title mt-0">{{ $brand->name }}</h4>
                    <p class="card-text text-muted ">{{ $brand->tagline }}</p>
                    <a href="#" class="btn btn-primary">Publish</a>   
                </div><!--end card -body-->
            </div><!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection