@extends('layouts.website')
@section('title', 'Payment Canceled')
@section('content')

    <section id="success_message">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="success_message_content text-center">
                        <span><i class="icofont-close"></i></span>
                        <h3>Ops! Your payment has canceled</h3>
                        <p>Please try again</p>
                        @auth('customer')
                        <a href="{{ route('customer.dashboard') }}">Go to Dashboard</a>
                        @else
                        <a href="{{ route('home') }}">Return Shop</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection