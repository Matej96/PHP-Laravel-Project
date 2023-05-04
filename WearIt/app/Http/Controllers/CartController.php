<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $products = DB::table('product_variations')
            ->select('product_name', 'size_name', 'price', 'amount')
            ->join('products', 'product_variations.product_id' , '=', 'products.id')
            ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
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
            ->where('size_id', '=', $request->input('product_id'))
            ->pluck('quantity')->first();

        if ($quantity > 0){
            return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
        } else {
            return redirect()->back()->with('error', 'Produkt je vypredaný!');
        }

    }
}
