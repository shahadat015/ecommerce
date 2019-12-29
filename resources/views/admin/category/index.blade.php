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
                            <div id="jstree-checkbox">
                                <ul>
                                    @foreach($categories as $maincategory)
                                    <li data-url="{{ route('admin.categories.edit', $maincategory->id) }}" data-id="{{ $maincategory->id }}" data-jstree='{"icon":"fa fa-folder text-warning font-18"}' class="jstree-open">{{ $maincategory->name }}
                                        <ul>
                                            @foreach($maincategory->subcategories as $subcategory)
                                            <li data-id="{{ $subcategory->id }}" data-url="{{ route('admin.categories.edit', $subcategory->id) }}" data-id="{{ $maincategory->id }}" data-jstree='{"icon":"fa fa-folder text-warning font-18"}' class="jstree-open">{{ $subcategory->name }}
                                                <ul>
                                                    @foreach($subcategory->subcategories as $category)
                                                    <li data-url="{{ route('admin.categories.edit', $category->id) }}" data-id="{{ $maincategory->id }}" data-id="{{ $category->id }}" data-jstree='{"icon":"fa fa-folder text-warning font-18"}'>{{ $category->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-6" id="category-form">
                            <form action="{{ route('admin.categories.store') }}" method="post" id="category-form" class="form-horizontal form-wizard-wrapper">
                                @csrf

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Category Name</label>
                                    <input name="name" class="form-control" type="text" placeholder="e.g. Eletronics">
                                </div>

                                <div class="form-group">
                                    <label for="example-email-input1" class="col-form-label">Selete Category</label>
                                    <select name="category_id" class="form-control" id="category">
                                        <option value="">Choose Category</option>
                                        @foreach($categories as $maincategory)
                                            <option value="{{ $maincategory->id }}">{{ $maincategory->name }}</option>
                                            @foreach($maincategory->subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">|--{{ $subcategory->name }}</option>
                                            @endforeach
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