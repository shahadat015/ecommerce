@extends('layouts.admin')
@section('title', $page->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Page</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Product</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.pages.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.pages.update', $page->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#seo" role="tab">SEO</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="general" role="tabpanel">
                                <h4>General</h4><hr>
                                <div class="form-group">
                                    <label for="name">Name<b class="text-danger">*</b></label>
                                    <input type="text" name="name" class="form-control" value="{{ $page->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Body<b class="text-danger">*</b></label>
                                    <textarea id="elm1" name="body">{{ $page->body }}</textarea>
                                </div>

                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="is_active" class="custom-control-input" id="customCheck1" {{ $page->is_active ==1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Publish the page</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="seo" role="tabpanel">
                                <h4>SEO</h4><hr>

                                <div class="form-group">
                                    <label for="name">Page URL</label>
                                    <input type="text" name="url" class="form-control" value="{{ $page->slug }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ $page->metadata->meta_title ?? ''}}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" value="{{ $page->metadata->meta_keywords ?? ''}}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" cols="30" rows="10">{{ $page->metadata->meta_description ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@push('js')
    <script src="{{asset('contents/admin')}}/plugins/tinymce/tinymce.min.js"></script>
    <script src="{{asset('contents/admin')}}/pages/jquery.form-editor.init.js"></script>
@endpush
