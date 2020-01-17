@extends('layouts.admin')
@section('title', 'Categories')
@push('css')
    <link href="{{ asset('contents/admin') }}/plugins/treeview/themes/default/style.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/plugins/treeview/file-explore.css" rel="stylesheet">   
@endpush
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item active">Categories</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Categories Information</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.categories.index') }}"><i class="mdi mdi-plus-circle-outline"></i> Create Category</a>
                    <button class="delete-category btn btn-danger btn-sm float-right mr-2" data-url="{{ route('admin.category.destroy') }}" disabled=""><i class="mdi mdi-delete"></i> Delete</button>
                </div>
                    
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div id="jstree-checkbox"></div>
                        </div>
                        <div class="col-6 category-form">
                            <form action="{{ route('admin.categories.store') }}" method="post" id="create-category" class="form-horizontal form-wizard-wrapper">
                                @csrf

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Category Name</label>
                                    <input name="name" class="form-control" type="text" placeholder="e.g. Eletronics">
                                </div>

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Parent Category</label>
                                    <select name="parent_id" class="form-control" id="category">
                                        <option value="">Parent Category</option>
                                        @foreach($categories as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" class="custom-control-input" id="customCheck" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck">Status</label>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
                                    <button type="reset" class="btn btn-info waves-effect waves-light">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

@endsection

@push('js')
    <script src="{{ asset('contents/admin') }}/plugins/treeview/jstree.min.js"></script>
    <script src="{{ asset('contents/admin') }}/plugins/treeview/file-explore.js"></script>
    <script src="{{ asset('contents/admin') }}/pages/jquery.treeview.init.js"></script>
    <script src="{{ asset('contents/admin') }}/js/category.js"></script>
@endpush