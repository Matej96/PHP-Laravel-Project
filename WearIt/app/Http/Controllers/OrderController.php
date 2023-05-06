<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $selectedPayment = $request->input('selected_payment');
        $selectedTransport = $request->input('selected_transport');

        dd($selectedPayment, $selectedTransport);
        return view('order');
    }
}
