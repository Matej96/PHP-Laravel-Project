<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){

    }
//        $products = DB::table('products_variations')
//            ->select('product_name', '')
//            ->join('products', 'products_variations.product_id' , '=', ' products.id')
//            ->join('')
//            ->join('product_order', 'products_variations.')
//            ->get();
//
//        return view('cart');
//    }
//
//    public function addToCart($id)
//    {
//        $product = Product::findOrFail($id);
//        $cart = session()->get('cart', []);
//
//        if(isset($cart[$id])) {
//            $cart[$id]['quantity']++;
//        } else {
//            $cart[$id] = [
//                "name" => $product->name,
//                "quantity" => 1,
//                "price" => $book->price,
//                "image" => $book->image
//            ];
//        }
//        session()->put('cart', $cart);
//        return redirect()->back()->with('success', 'Book has been added to cart!');
//    }
}
