@extends('layouts.admin')
@section('title', $review->reviewer_name)
@section('content')
    <!-- Page-Title -->
    @component('layouts.partials.breadcumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Review</a></li>
        <li class="breadcrumb-item active">Update</li>
    @endcomponent
    
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-2 header-title float-left">Update Review</h4>
                    <a class="btn btn-info btn-sm float-right" href="{{ route('admin.reviews.index') }}"><i class="mdi mdi-arrow-left-thick"></i> Back</a>
                </div>
                    
                <form action="{{ route('admin.reviews.update', $review->id) }}" method="post" id="update-form" class="form-horizontal form-wizard-wrapper">
                   @csrf
                   @method('put')
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Rating</label>
                            <select name="rating" class="form-control">
                                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Reviewer Name</label>
                            <input name="reviewer_name" class="form-control" type="text" value="{{ $review->reviewer_name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="example-email-input1" class="col-form-label">Review</label>
                            <textarea name="comment" class="form-control" rows="10">{{ $review->comment }}</textarea>
                        </div>

                        <div class="form-check-inline my-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_approved" class="custom-control-input" id="customCheck" {{ $review->is_approved == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="customCheck">Approve this review</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Update</button>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-info waves-effect waves-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection