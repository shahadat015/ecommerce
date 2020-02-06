@extends('layouts.website')
@section('title', 'Contact Us')
@section('content')

    <!-- satrt contact map area -->
    <section id="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1826.0819358388226!2d90.3852685578759!3d23.741535051366622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b8563faa91%3A0x48ef64eee626e5!2sDhanmondi%20Sample%20Collection%20Booth%2C%20Thyrocare%20Bangladesh%20Ltd.!5e0!3m2!1sen!2sbd!4v1574057010333!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    <!-- satrt contact  main content -->
    <section id="contact_main_content">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="contact_page_info">
                        <h3>Store information</h3>
                        <ul>
                            <li><span><i class="icofont-location-pin"></i></span> {{ config('settings.store_address') }}</li>
                            <li><span><i class="icofont-ui-call"></i></span> Call us: <a href="tel:{{ config('settings.store_phone') }}">{{ config('settings.store_phone')  }}</a></li>
                            <li><span><i class="icofont-email"></i></span> Email us: <a href="mailto:{{ config('settings.store_email') }}">{{ config('settings.store_email')  }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="contact_form_form">
                        <form action="{{ route('contact') }}" method="post" id="contact-form">
                            @csrf

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Enter Your Email" required> 
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" placeholder="Enter Your Subject" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
