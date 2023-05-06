<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductVariations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index(){
        $products = DB::table('product_variations')
            ->select('products.id', 'cart_products.id as cp_id', 'product_variation_id', 'product_name', 'size_name', 'price', 'amount', 'color_name')
            ->join('products', 'product_variations.product_id' , '=', 'products.id')
            ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
            ->join('colors', 'colors.id','=', 'products.color_id')
            ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
            ->get();

        foreach ($products as $product) {
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }

//        dd($products);

        $price = 0;
        foreach ($products as $product){
            $price += $product->amount * $product->price;
        }

        return view('cart', [
            'products' => $products,
            'price' => $price
        ]);
    }
    public function addToCart(Request $request)
    {
        if($request->input('size') == null){
            return redirect()->back()->with('error', 'Vyberte veľkosť produktu!');
        }

        $quantity = ProductVariations::where('product_id', '=', $request->input('product_id'))
            ->where('size_id', '=', $request->input('size'))
            ->pluck('quantity')->first();

        if ($quantity > 0 && $quantity >= $request->input('quantity')){
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

            DB::table('product_variations')
                ->where('id', '=', $pv_id)
                ->decrement('quantity', intval($request->input('quantity')));

            return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
        } else if($quantity == 0){
            return redirect()->back()->with('error', 'Produkt je vypredaný!');
        }

        return redirect()->back()->with('error', 'Zadané množstvo nie je na sklade!');
    }

    public function removeFromCart(Request $request){
        $parts = explode('-', $request->input('product_variation_id'));
        $pv_id = $parts[0];
        $cp_id = $parts[1];

        $amount = DB::table('cart_products')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
            ->where('product_variation_id', '=', $pv_id)
            ->where('cart_products.id', '=', $cp_id)
            ->value('amount');
//        Log::info($amount);

        DB::table('product_variations')
            ->where('id', '=', $pv_id)
            ->increment('quantity', $amount);
//
        DB::table('cart_products')
            ->where('product_variation_id', '=', $pv_id)
            ->where('id', '=', $cp_id)
            ->delete();

        return response()->json(['success' => 'Produkt bol odstránený z košíka!']);
    }
}
