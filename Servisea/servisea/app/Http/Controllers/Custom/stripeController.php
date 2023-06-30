<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use App\Mail\orderMail;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \Stripe\StripeClient;

class stripeController extends Controller
{
    public function session(request $request)
    {

        $session= $request->session()->get('user');

        $userInput = $request->validate([
            'First_Name'      => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Last_Name'      => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Country'      => 'required|string|max:255|regex:/^[a-zA-Z- ]+$/',
            'Phone'      => 'required|string|max:255|regex:/^[0-9+]+$/',
            'Email'      => 'required|email',
       ]);

       $orderDetails= $request->session()->get('orderDetails');


        \Stripe\Stripe::setApiKey('sk_test_51NLJEjJylGbEvkNuFMvA5PPqJMRjRhNtoywaYFYsMyWbKspT6ZXleUQTOvoMdLFKc80v5Z8QMuEYXUDfWVgRFNn200V3N2orct');


        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $session['USERNAME'],
                        ],
                        'unit_amount'  => ($orderDetails['ORDER_AMOUNT']*100),
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),

        'cancel_url'  => route('index'),
        ]);


        request()->session()->put(['id'=> $session->id ,'bill' => $userInput ]);

        return redirect()->away($session->url);

    }

    public function success(request $request)
    {

        $bill= $request->session()->get('bill');
        $stripe = new \Stripe\StripeClient('sk_test_51NLJEjJylGbEvkNuFMvA5PPqJMRjRhNtoywaYFYsMyWbKspT6ZXleUQTOvoMdLFKc80v5Z8QMuEYXUDfWVgRFNn200V3N2orct');
        $stripe = $stripe->checkout->sessions->retrieve($request->session()->get('id'),[]);
        $orderDetails= $request->session()->get('orderDetails');
        $s_user= $request->session()->get('user');



        $payment = Payment::create([
            'PAYMENT_DATE' => now(),
            'PAYMENT_METHOD' => 'CARDS',
            'PAYMENT_AMOUNT' => $orderDetails['ORDER_AMOUNT'],
            'PAYMENT_CURRENCY'=> 'USD',
            'PAYMENT_STATUS' => 'ACCEPTED',
            'PAYMENT_INTENT' => $stripe->payment_intent,
            'BILL_LNAME' => $bill['Last_Name'],
            'BILL_FNAME'=> $bill['First_Name'],
            'BILL_EMAIL'=> $bill['Email'],
            'BILL_TEL' => $bill['Phone'],
            'BILL_COUNTRY' => $bill['Country'],
            ]);

        $order = Order::create([
        'PACKAGE_ID' => $orderDetails['PACKAGE_ID'],
        'USER_ID' => $orderDetails['USER_ID'],
        'FREELANCER_ID'=> $orderDetails['FREELANCER_ID'],
        'ORDER_AMOUNT' => $orderDetails['ORDER_AMOUNT'],
        'ORDER_DATE' => now(),
        'ORDER_DUE'=>$orderDetails['ORDER_DUE'],
        'ORDER_STATUS'=> 'IN PROGRESS',
        'PAYMENT_ID' => $payment['id']]
        );

        Mail::to($s_user['USER_EMAIL'])->send(new orderMail($order['id'],$order['ORDER_DATE'],$order['ORDER_AMOUNT'],$order['PAYMENT_ID'],$payment['PAYMENT_METHOD'],));

        return redirect('/servisea/List/order');

    }
}
