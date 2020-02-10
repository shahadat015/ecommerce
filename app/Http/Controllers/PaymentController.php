<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\Customer;
use Uzzal\SslCommerz\IpnNotification;
use Cart;

class PaymentController extends Controller
{
    public function index()
    {
        if(!session()->get('order')) return redirect('checkout');
        return view('website.checkout.payment');
    }

    public function store(Request $request)
    {

        if($request->payment_method == 'cod'){
            $order = session()->get('order');
            $order->payment_method = 'cod';
            $order->save();
            return redirect('order/confirm')->with(['success' => 'Payment Successful!']);
        }

        if($request->payment_method == 'ssl_commerz'){
            $order = session()->get('order');
            $customer = new Customer($order->customer_name, $order->customer_email, $order->customer_phone);
            $resp = Client::initSession($customer, $order->total);
            return redirect($resp->getGatewayUrl());
        }

        return back()->with(['error' => 'Payment Failed! Please try again']);
    }

    public function confirm()
    {
        $order = session()->get('order');

        if(ipn_hash_varify(config('sslcommerz.store_password'))){
            $ipn = new IpnNotification($_POST);
            $val_id = $ipn->getValId();
            $transaction_id = $ipn->getTransactionId();
            $amount = $ipn->getAmount();
            $resp = Client::verifyOrder($val_id);

            $order->payment_method = 'SSL Commerz';
            $update = $order->save();

            $order->transaction()->create([
                'transaction_id' => $transaction_id,
                'amount' => $amount,
                'payment_method' => "SSL Commerz"
            ]);
        }
        
        return view('website.checkout.confirm', compact('order'));
    }

    public function success()
    {

        if(!session()->get('order')) return redirect('payment');

        Cart::destroy();
        session()->forget('order');
        return view('website.checkout.success');
    }

    public function failed()
    {
        return view('website.checkout.failed');
    }

    public function canceled()
    {
        return view('website.checkout.canceled');
    }
}
