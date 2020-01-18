@extends('layouts.website')
@section('title', $page->name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $page->name }}</div>

                <div class="card-body">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
