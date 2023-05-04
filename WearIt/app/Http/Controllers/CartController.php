<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductVariations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $products = DB::table('product_variations')
            ->select('product_name', 'size_name', 'price', 'amount', 'color_name')
            ->join('products', 'product_variations.product_id' , '=', 'products.id')
            ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
            ->join('colors', 'colors.id','=', 'products.color_id')
            ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
            ->get();

//        dd($products);

        return view('cart', [
            'products' => $products
        ]);
    }
    public function addToCart(Request $request)
    {
        $quantity = ProductVariations::where('product_id', '=', $request->input('product_id'))
            ->where('size_id', '=', $request->input('size'))
            ->pluck('quantity')->first();

//        dd($request->input('product_id'), $request->input('size'), $request->input('qty'));
//        dd($request->input('product_id'));
//        dd($quantity);

        if ($quantity > 0){
            $cart_id = DB::table('carts')
                ->select('id')
                ->where('user_id', '=', auth()->user()->getAuthIdentifier())
                ->value('id');

            $pv_id = DB::table('product_variations')
                ->select('id')
                ->where('product_id', '=', $request->input('product_id'))
                ->where('size_id', '=', $request->input('size'))
                ->value('id');

            DB::table('cart_products')->insert([
                'cart_id' => $cart_id,
                'product_variation_id' => $pv_id,
                'amount' => intval($request->input('quantity'))
            ]);

            return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
        } else {
            return redirect()->back()->with('error', 'Produkt je vypredaný!');
        }
    }
}
