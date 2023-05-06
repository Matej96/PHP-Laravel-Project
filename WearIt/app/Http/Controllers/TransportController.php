<?php

namespace App\Http\Controllers;

use App\Models\ProductVariations;
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

        return view('transport');
    }
}
