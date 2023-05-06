<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $selectedPayment = intval($request->input('selected_payment'));
        $selectedTransport = intval($request->input('selected_transport'));

        $data = [
            'payment_id' => $selectedPayment,
            'transport_id' => $selectedTransport
        ];
        dump($data);
        return view('order', ['data' => $data]);
    }
}
