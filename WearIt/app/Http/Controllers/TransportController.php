<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\ProductVariations;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportController extends Controller
{
    public function index(Request $request)
    {

        $quantities = $request->input('qty');

        if (auth()->check()) {
            // Najdenie kosika pouzivatela
            $card_id = DB::table('carts')
                ->select('id')
                ->where('user_id', '=', auth()->user()->getAuthIdentifier())
                ->value('id');

            // Zistenie ci je mnozstvo daneho tovaru dostupne
            foreach ($quantities as $pv => $quantity) {
                $bought_count_before = DB::table('cart_products')
                    ->select('amount')
                    ->where('product_variation_id', '=', $pv)
                    ->where('cart_id', '=', $card_id)
                    ->value('amount');

                $new_q = $quantity - $bought_count_before;
                // Ak nie upozornenie pouzivatela
                if ($new_q > ProductVariations::find($pv)->quantity) {
                    return redirect()->back()->with('error', 'Požadované tovaru množstvo nie je na sklade.');
                }
            }

            // Aktualizacia poctu tovaru v tabulkach cart_products a
            foreach ($quantities as $pv_id => $q) {
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
        } else {
            // Zistenie ci je mnozstvo daneho tovaru dostupne
            $i = 0;
            $cart = session()->get('products');
            foreach ($quantities as $pv => $quantity) {
                $bought_count_before = $cart[$i]['quantity'];
                $new_q = $quantity - $bought_count_before;

                // Ak nie upozornenie pouzivatela
                if ($new_q > ProductVariations::find($pv)->quantity) {
                    return redirect()->back()->with('error', 'Požadované tovaru množstvo nie je na sklade.');
                }

                $i++;
            }

            $i = 0;
            foreach ($quantities as $pv_id => $q) {
                $bought_count_before = $cart[$i]['quantity'];
                $new_q = $quantity - $bought_count_before;

                DB::table('product_variations')
                    ->where('id', '=', $pv_id)
                    ->decrement('quantity', $new_q);

                $i++;
            }

//            session()->forget('products');
        }

        $transports = Transport::all();
        $payments = Payment::all();

        $data = [
            'transports' => $transports,
            'payments' => $payments
        ];

        return view('transport', ['data' => $data]);
    }

    public function finish_order(Request $request)
    {

        $rules_main = [

            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number' => 'required|numeric',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'prc' => 'required|numeric',
            'house_number' => 'required|numeric',
            'selected_transport' => 'required',
            'selected_payment' => 'required'
        ];

        $rules_main_response = [

            'first_name.required' => 'Zadajte meno',
            'first_name.alpha' => 'Meno musí obsahovať iba znaky abecedy',
            'last_name.required' => 'Zadajte priezvisko',
            'last_name.alpha' => 'Priezvisko musí obsahovať iba znaky abecedy',
            'phone_number.required' => 'Zadajte telefónne čislo',
            'phone_number.numeric' => 'Telefónne číslo musí byť čislo',
            'country.required' => 'Zadajte krajinu',
            'city.required' => 'Zadajte mesto',
            'street.required' => 'Zadajte ulicu',
            'prc.required' => 'Zadajte poštové smerovacie číslo',
            'prc.numeric' => 'Poštové smerovacie číslo musí byť číslo',
            'house_number.required' => 'Zadajte číslo domu',
            'house_number.numeric' => 'Číslo domu musí byť číslo',
            'selected_transport.required' => 'Zadajte spôsob dopravy',
            'selected_payment.required' => 'Zadajte spôsob platby'
        ];

        $validatedData = $request->validate($rules_main, $rules_main_response);

        if (auth()->check()){
            $card_id = DB::table('carts')
                ->select('id')
                ->where('user_id', '=', auth()->user()->getAuthIdentifier())
                ->value('id');

            $card_products = DB::table('cart_products as cp')
                ->join('product_variations as pv', 'pv.id', '=', 'cp.product_variation_id')
                ->join('products as pr', 'pr.id', '=', 'pv.product_id')
                ->where('cp.cart_id', '=', $card_id)
                ->get();
        } else {
            $cart = session()->get('products');
            $card_products = collect();

//            dd($cart, $card_products);

            foreach ($cart as $product) {
                $card_products->push(DB::table('product_variations')
                    ->select('price', 'product_name', DB::raw($product['quantity'] . ' as amount'))
                    ->join('products', 'products.id', '=', 'product_variations.product_id')
                    ->where('products.id', '=', $product['id'])
                    ->where('size_id', '=', $product['size'])
                    ->get());
            }

            $card_products = $card_products->flatten();
        }

        $transport = DB::table('transports')
            ->where('id', '=', $validatedData['selected_transport'])
            ->first();

        $payment = DB::table('payments')
            ->where('id', '=', $validatedData['selected_payment'])
            ->first();

        $total_price = 0;
        foreach ($card_products as $product) {
            $total_price += $product->amount * $product->price;
        }

        $total_price += $transport->price;
        $total_price += $payment->price;

        $data = [
            'price' => $total_price,
            'payment' => $payment,
            'transport' => $transport,
            'products' => $card_products,
            'order' => $validatedData
        ];

        return view('delivery', ['data' => $data]);

    }

    public function return_back()
    {
        $transports = Transport::all();
        $payments = Payment::all();

        $data = [
            'transports' => $transports,
            'payments' => $payments
        ];

        return view('transport', ['data' => $data]);
    }
}
