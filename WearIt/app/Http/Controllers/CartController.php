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
use PhpParser\ErrorHandler\Collecting;
use Ramsey\Collection\Collection;

class CartController extends Controller
{
    public function index(){
        if (auth()->check()){
            $products = DB::table('product_variations')
                ->select('products.id', 'cart_products.id as cp_id', 'product_variation_id', 'product_name', 'size_name', 'price', 'amount', 'color_name')
                ->join('products', 'product_variations.product_id' , '=', 'products.id')
                ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
                ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
                ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
                ->join('colors', 'colors.id','=', 'products.color_id')
                ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
                ->get();

//            dd($products);
        } else {
            $cart = session()->get('products', collect());
//            session()->forget('products');
//            session()->save();
//            dd(session()->get('products'));

            $products = collect();
            $index = 0;
            foreach ($cart as $product){
                $products->push(DB::table('product_variations')
                    ->select('products.id', DB::raw($index . ' as cp_id'), 'product_variations.id as product_variation_id', 'product_name', 'size_name', 'price', DB::raw($product['quantity'] . ' as amount'), 'color_name')
                    ->join('products', 'product_variations.product_id' , '=', 'products.id')
                    ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
                    ->join('colors', 'colors.id','=', 'products.color_id')
                    ->where('products.id', '=', $product['id'])
                    ->where('sizes.id', '=', $product['size'])
                    ->get());
                $index++;
            }

            $products = $products->flatten();
        }

        foreach ($products as $product) {
//            dd($product);
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }

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
            if (auth()->check()){
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

            } else {
                $products = session()->get('products', collect());

                if ($products == null){
                    $products = collect();
                }


                $new_product = [
                    'id' => $request->input('product_id'),
                    'size' => $request->input('size'),
                    'quantity' =>$request->input('quantity')
                ];

                $products->push($new_product);

                DB::table('product_variations')
                    ->where('product_id', '=', $request->input('product_id'))
                    ->where('size_id', '=', $request->input('size'))
                    ->decrement('quantity', intval($request->input('quantity')));

                session()->put('products', $products);
                session()->save();
            }

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

        if (auth()->check()){
            $amount = DB::table('cart_products')
                ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
                ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
                ->where('product_variation_id', '=', $pv_id)
                ->where('cart_products.id', '=', $cp_id)
                ->value('amount');

            DB::table('product_variations')
                ->where('id', '=', $pv_id)
                ->increment('quantity', $amount);

            DB::table('cart_products')
                ->where('product_variation_id', '=', $pv_id)
                ->where('id', '=', $cp_id)
                ->delete();
        } else {
            $cart = session()->get('products', collect());

            $pv_id = DB::table('product_variations')
                ->where('product_id', '=', $request->input('product_id'))
                ->where('size_id', '=', $request->input('size_id'))
                ->value('product_variations.id');

            Log:info($cart[$cp_id]);
            $amount = $cart[$cp_id]['quantity'];

            DB::table('product_variations')
                ->where('id', '=', $pv_id)
                ->increment('quantity', $amount);

            $cart->forget($cp_id);
            session()->put('products', $cart);
            session()->save();
        }

        return response()->json(['success' => 'Produkt bol odstránený z košíka!']);
    }
}
