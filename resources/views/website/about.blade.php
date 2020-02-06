@extends('layouts.website')
@section('title', $page->metadata->meta_title ?? $page->name)
@section('description', $page->metadata->meta_description ?? '')
@section('keywords', $page->metadata->meta_keywords ?? '')
@section('content')
    @component('website.partial.breadcumb')
    <li><i class="icofont-thin-right"></i> {{ $page->name }} </li>
    @endcomponent
    <!-- satrt about us banar -->
    <section id="about_banar">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="about_us_banar" style="background: url({{ asset('contents/website/img/about-us.jpg' )}});">
                        <h3>{{ $page->name }}</h3>
                        <p>{{ config('settings.store_tagline') }}</p> 
                        <a href="{{ url('/') }}"> Shop WITH US</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about main content start -->
    <section id="about_main_content">
        <div class="container">
            <div class="row">
                {!! $page->body !!}
            </div>
        </div>
    </section>
@endsection