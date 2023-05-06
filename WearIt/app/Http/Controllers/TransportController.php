<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\ProductVariations;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportController extends Controller
{
    public function index(Request $request){

        $quantities = $request->input('qty');
        // Najdenie kosika pouzivatela
        $card_id = DB::table('carts')
            ->select('id')
            ->where('user_id', '=', auth()->user()->getAuthIdentifier())
            ->value('id');

        // Zistenie ci je mnozstvo daneho tovaru dostupne
        foreach ($quantities as $pv => $quantity){
            $bought_count_before = DB::table('cart_products')
                ->select('amount')
                ->where('product_variation_id', '=', $pv)
                ->where('cart_id', '=', $card_id)
                ->value('amount');

            $new_q = $quantity - $bought_count_before;
            // Ak nie upozornenie pouzivatela
            if($new_q > ProductVariations::find($pv)->quantity){
                return redirect()->back()->with('error', 'Požadované tovaru množstvo nie je na sklade.');
            }
        }

        // Aktualizacia poctu tovaru v tabulkach cart_products a
        foreach ($quantities as $pv_id => $q){
            $bought_count_before = DB::table('cart_products')
                ->select('amount')
                ->where('product_variation_id', '=', $pv_id)
                ->where('cart_id', '=', $card_id)
                ->value('amount');

            $new_q = $q - $bought_count_before;

            DB::table('product_variations')
                ->where('id', '=', $pv_id)
                ->decrement('quantity', $new_q);


            DB::table('cart_products')
                ->where('product_variation_id', '=', $pv_id)
                ->where('cart_id', '=', $card_id)
                ->increment('amount', $new_q);
        }

        $transports = Transport::all();
        $payments = Payment::all();

        $data = [
            'transports' => $transports,
            'payments' => $payments
        ];

        return view('transport', ['data' => $data]);
    }

    public function finish_order(Request $request){

        $payment = $request->input('selected_payment');
        $transport = $request->input('selected_transport');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone_number = $request->input('phone_number');
        $country = $request->input('country');
        $city = $request->input('city');
        $street = $request->input('street');
        $prc = $request->input('prc');
        $house_number = $request->input('house_number');

        $products = DB::table('product_variations')
            ->select('products.id', 'product_variation_id', 'product_name', 'size_name', 'price', 'amount', 'color_name')
            ->join('products', 'product_variations.product_id', '=', 'products.id')
            ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
            ->get();

        $total_price = 0;

        foreach ($products as $product){
            $total_price += $product->amount * $product->price;
        }

        $order_id = DB::table('orders')
            ->insertGetId([
               'user_id' => auth()->user()->getAuthIdentifier(),
                'payment_id' => $payment,
                'transport_id' => $transport,
                'total_price' => $total_price,
                'created_at' => now()
            ]);

        foreach ($products as $product){
            DB::table('product_orders')
                ->insert([
                    'order_id' => $order_id,
                    'product_variation_id' => $product->product_variation_id,
                    'amount' => $product->amount,
                    'price' => $product->price,
                ]);
        }

        $card_id = DB::table('carts')
            ->select('id')
            ->where('user_id', '=', auth()->user()->getAuthIdentifier())
            ->value('id');

        DB::table('cart_products')
            ->where('cart_id', '=', $card_id)
            ->delete();

        return redirect('/')->with('success', 'Objednávka bola úspešne vykonaná!');

    }
}
