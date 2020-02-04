@extends('layouts.website')
@section('title', 'Order Success')
@section('content')

    <section id="success_message">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="success_message_content text-center">
                        <span><i class="icofont-check-alt"></i></span>
                        <h3>Congratulation! Your order has been processed</h3>
                        <p>We will contact with you as soon as possible.</p>
                        <a href="{{url('/')}}">Retuen Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection