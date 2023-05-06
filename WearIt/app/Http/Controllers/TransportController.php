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

        $rules_main = [

            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone_number' => 'required|numeric',
            'country' => 'required|alpha',
            'city' => 'required|alpha',
            'street' => 'required',
            'prc' => 'required|numeric',
            'house_number' => 'required|numeric'
        ];

        $rules_main_response =[

            'first_name.required' => 'Zadajte meno',
            'first_name.alpha' => 'Meno musí obsahovať iba znaky abecedy',
            'last_name.required' => 'Zadajte priezvisko',
            'last_name.alpha' => 'Priezvisko musí obsahovať iba znaky abecedy',
            'phone_number.required' => 'Zadajte telefónne čislo',
            'phone_number.numeric' => 'Telefónne číslo musí byť čislo',
            'country.required' => 'Zadajte krajinu',
            'country.alpha' => 'Krajina musí obsahovať iba znaky abecedy',
            'city.required' => 'Zadajte mesto',
            'city.alpha' => 'Mesto musí obsahovať iba znaky abecedy',
            'street.required' => 'Zadajte ulicu',
            'prc.required' => 'Zadajte poštové smerovacie číslo',
            'prc.numeric' => 'Poštové smerovacie číslo musí byť číslo',
            'house_number.required' => 'Zadajte číslo domu',
            'house_number.numeric' => 'Číslo domu musí byť číslo',
        ];

        $validatedData = $request->validate($rules_main,$rules_main_response);

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
                'payment_id' => $validatedData['selected_payment'],
                'transport_id' => $validatedData['selected_transport'],
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
