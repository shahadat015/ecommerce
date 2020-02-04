@extends('layouts.website')
@section('title', 'About Us')
@section('content')

    @component('website.breadcumb')
    <li><i class="icofont-thin-right"></i> About Us </li>
    @endcomponent
    <!-- satrt about us banar -->
    <section id="about_banar">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="about_us_banar" style="background: url({{asset('storage/about/'.$about->image)}});">
                        <h3>{{$about->title}}</h3>
                        <p>{{$about->subtitle}}!</p> 
                        <a href="{{$about->btn_url}}">{{$about->btn_text}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about main content start -->
    <section id="about_main_content">
        <div class="container">
            <div class="row">
                {!! $about->description !!}
            </div>
        </div>
    </section>
@endsection