@extends('layouts.admin')
@section('title', $slider->name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Slider</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.sliders.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.sliders.update', $slider->id) }}" id="update-form" method="post" id="" class="form-horizontal form-wizard-wrapper">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#slides" role="tab">Slides</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="slides" role="tabpanel">
                                <h4>Slides</h4><hr><br>
                                <div class="repeater-custom-show-hide repeater-slide">
                                    <div data-repeater-list="slides">
                                        @forelse($slider->slides as $slide)
                                        <div data-repeater-item="" class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 py-3">
                                                        <div class="single-image image-picker" data-image="slider">
                                                            <div class="image-holder">
                                                                @if($slide->image)
                                                                <img src="{{ asset($slide->image) }}" alt="">
                                                                <input type="hidden" name="image" value="{{ $slide->image }}">
                                                                @else
                                                                <i class="far fa-image"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="example-email-input1" class="col-form-label">Title</label>
                                                                <input name="title" class="form-control" type="text" value="{{ $slide->title }}">
                                                            </div>

                                                            <div class="col-sm-5">
                                                                <label for="example-email-input1" class="col-form-label">Subtitle</label>
                                                                <input name="subtitle" class="form-control" type="text" value="{{ $slide->subtitle }}">
                                                            </div>

                                                            <div class="col-sm-1 mt-4 pt-2">
                                                                <span data-repeater-delete="" class="btn btn-danger">
                                                                    <span class="far fa-trash-alt"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button Text</label>
                                                                <input type="text" name="call_to_action_text" class="form-control" value="{{ $slide->call_to_action_text }}">
                                                            </div><!--end col-->

                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button URL</label>
                                                                <input type="text" name="call_to_action_url" class="form-control" value="{{ $slide->call_to_action_url }}">
                                                            </div><!--end col-->

                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button URL</label>
                                                                <select name="open_in_new_window" class="form-control">
                                                                    <option value="1" {{ $slide->open_in_new_window == 1 ? 'selected' : '' }}>Open in new tab</option>
                                                                    <option value="0" {{ $slide->open_in_new_window == 0 ? 'selected' : '' }}>Load in current tab</option>
                                                                </select>
                                                            </div><!--end col-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div data-repeater-item="" class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3 py-3">
                                                        <div class="single-image image-picker" data-image="slider">
                                                            <div class="image-holder">
                                                                <i class="far fa-image"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="example-email-input1" class="col-form-label">Title</label>
                                                                <input name="title" class="form-control" type="text">
                                                            </div>

                                                            <div class="col-sm-5">
                                                                <label for="example-email-input1" class="col-form-label">Subtitle</label>
                                                                <input name="subtitle" class="form-control" type="text">
                                                            </div>

                                                            <div class="col-sm-1 mt-4 pt-2">
                                                                <span data-repeater-delete="" class="btn btn-danger">
                                                                    <span class="far fa-trash-alt"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button Text</label>
                                                                <input type="text" name="call_to_action_text" class="form-control">
                                                            </div><!--end col-->

                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button URL</label>
                                                                <input type="text" name="call_to_action_url" class="form-control">
                                                            </div><!--end col-->

                                                            <div class="col-sm-4">
                                                                <label class="control-label">Button URL</label>
                                                                <select name="open_in_new_window" class="form-control">
                                                                    <option value="1">Open in new tab</option>
                                                                    <option value="0">Load in current tab</option>
                                                                </select>
                                                            </div><!--end col-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforelse
                                    </div>

                                    <div class="form-group mb-2 row">
                                        <div class="col-3">
                                            <span data-repeater-create="" class="btn btn-light btn-md">
                                                <span class="fa fa-plus"></span> Add Slide
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="setting" role="tabpanel">
                                <h4>Setting</h4><hr>
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $slider->name }}">
                                </div>
                                <div class="form-group autoplay">
                                    <label class="control-label">Autoplay Speed</label>
                                    <input type="number" name="autoplay_speed" class="form-control" value="{{ $slider->autoplay_speed }}">
                                </div>
                                <div class="my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="autoplay" class="custom-control-input" id="customCheck1" {{ $slider->autoplay == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Enable autoplay</label>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="arrows" class="custom-control-input" id="customCheck2" {{ $slider->arrows == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck2">Show Prev/Next arrows</label>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="dots" class="custom-control-input" id="customCheck3" {{ $slider->dots == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck3">Show Prev/Next dots</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    @include('admin.image.modal')
    <!-- end row -->
@endsection
@push('js')
    <script src="{{ asset('contents/admin') }}/plugins/repeater/jquery.repeater.min.js"></script>
    <script src="{{ asset('contents/admin') }}/pages/jquery.form-repeater.js"></script>
    <script src="{{ asset('contents/admin') }}/js/slider.js"></script>
@endpush