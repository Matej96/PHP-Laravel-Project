<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductlistController extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $products = DB::table('products')
            ->where('category_id', $id)
            ->whereNull('deleted_at')
            ->paginate(9);

        foreach ($products as $product) {
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }


        $colors = DB::table('products as pr')
            ->join('colors as cl', 'cl.id', '=', 'pr.color_id')
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

        $category = DB::table('categories')->where('id', $id)->value('category_name');

        $count = $products->count();
        $data = [
            'sizes' => $sizes,
            'colors' => $colors,
            'products' => $products,
            'category_id' => $id,
            'count' => $count,
            'category' => $category
        ];

        return view('product_list', ['data' => $data]);
    }

}
