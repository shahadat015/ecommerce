@extends('layouts.website')
@section('title', 'Contact Us')
@section('content')

    <!-- satrt contact map area -->
    <section id="contact_map">
        <iframe src="{{$basicinfo->google_map_url}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    <!-- satrt contact  main content -->
    <section id="contact_main_content">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="contact_page_info">
                        <h3>Store information</h3>
                        <ul>
                            <li><span><i class="icofont-location-pin"></i></span> {{$basicinfo->address}}</li>
                            <li><span><i class="icofont-ui-call"></i></span> Call us: <a href="tel:{{$basicinfo->phone}}">{{$basicinfo->phone}}</a></li>
                            <li><span><i class="icofont-email"></i></span> Email us: <a href="mailto:{{$basicinfo->email}}">{{$basicinfo->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="contact_form_form">
                        <form action="{{url('contact')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Enter Your Name" value="{{old('name')}}" required="">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Enter Your Email" value="{{old('email')}}" required=""> 

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" placeholder="Enter Your Subject" value="{{old('Subject')}}" required="">

                                        @if ($errors->has('subject'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" required="">{{old('message')}}</textarea>

                                        @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
