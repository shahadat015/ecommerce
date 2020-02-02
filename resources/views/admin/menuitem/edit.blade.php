@extends('layouts.admin')
@section('title', $menuitem->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Menu Item</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.menus.edit', $menu->id) }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.menus.items.update', $menuitem->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $menuitem->name }}">
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Type</label>
                            <select name="type" class="form-control menu-type">
                                <option value="category" {{ $menuitem->isCategoryType() ? 'selected' : '' }}>Category</option>
                                <option value="page" {{ $menuitem->isPageType() ? 'selected' : '' }}>Page</option>
                                <option value="url" {{ $menuitem->isUrlType() ? 'selected' : '' }}>URL</option>
                            </select>
                        </div>

                        <div class="form-group menu-category {{ $menuitem->isCategoryType() ? 'd-blok' : 'd-none'}}">
                            <label for="example-email-input1" class="col-form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $menuitem->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group menu-page {{ $menuitem->isPageType() ? 'd-blok' : 'd-none'}}">
                            <label for="example-email-input1" class="col-form-label">Page</label>
                            <select name="page_id" class="form-control">
                                <option value="">Select Page</option>
                                @foreach($pages as $page)
                                    <option value="{{ $page->id }}" {{ $menuitem->page_id == $page->id ? 'selected' : '' }}>{{ $page->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group menu-url {{ $menuitem->isUrlType() ? 'd-blok' : 'd-none'}}">
                            <label for="example-email-input1" class="col-form-label">URL</label>
                            <input name="url" class="form-control" type="text" value="{{ $menuitem->url }}">
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Target</label>
                            <select name="target" class="form-control">
                                <option value="_self" {{ $menuitem->target == '_self' ? 'selected' : '' }}>Same Tab</option>
                                <option value="_blank" {{ $menuitem->target == '_blank' ? 'selected' : '' }}>New Tab</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Parent Menu</label>
                            <select name="parent_id" class="form-control">
                                <option value="">Select Parent</option>
                                @foreach($menuitems as $menuItem)
                                    <option value="{{ $menuItem->id }}" {{ $menuitem->parent_id ==  $menuItem->id ? 'selected' : '' }}>{{ $menuItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck" {{ $menuitem->is_active ==  1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{ asset('contents/admin/js/menu.js') }}"></script>
@endpush