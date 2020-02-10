@extends('layouts.website')
@section('title', 'Payment Failed')
@section('content')
    <section id="success_message">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="success_message_content text-center">
                        <span><i class="icofont-close"></i></span>
                        <h3>Ops! Your payment was failed</h3>
                        <p>Please try again</p>
                        <a href="{{ route('payment') }}">Go to Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection