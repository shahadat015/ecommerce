@extends('layouts.admin')
@section('title', $menu->name)
@push('css')
    <link rel="stylesheet" href="{{ asset('contents/admin/plugins/nestable/jquery.nestable.min.css') }}">
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
        <li class="breadcrumb-item active">Edit</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Edit Menu</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.menus.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.menus.update', $menu->id) }}" method="post" id="update-menu" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $menu->name }}">
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck" {{ $menu->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Menu Items</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.menus.items.create', $menu->id) }}"><i class="mdi mdi-plus-circle-outline"></i> Create Menu Item</a>
                </div>
                <div class="card-body">
                    @if($menu->menuitems->count())
                    <div class="custom-dd dd" id="nestable_list_1">
                        @include('admin.menu.menu-item')
                    </div>
                    @else
                    <p class="alert bg-light"><b>No menu item</b></p>
                    @endif
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{ asset('contents/admin/plugins/nestable/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('contents/admin/pages/jquery.nastable.init.js') }}"></script>
    <script src="{{ asset('contents/admin/js/menu.js') }}"></script>
@endpush