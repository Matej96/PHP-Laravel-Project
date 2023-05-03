<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductlistController extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $products = DB::table('products')->where('category_id', $id)->paginate(9);

        $colors = DB::table('products as pr')
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('colors as cl', 'cl.id', '=', 'pv.color_id')
            ->select('cl.color_name', 'cl.hex_value')
            ->distinct()
            ->where('pr.category_id', '=', $id)
            ->get();

        $sizes = DB::table('products as pr')
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
            ->select('sz.size_name')
            ->distinct()
            ->where('pr.category_id', '=', $id)
            ->get();

        $count = $products->count();

        $data = [
            'sizes' => $sizes,
            'colors' => $colors,
            'products' => $products,
            'category_id' => $id,
            'count' => $count
        ];

        return view('product_list', ['data' => $data]);
    }
}
