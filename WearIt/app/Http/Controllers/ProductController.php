<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::find($id);

        $iterator = 1;
        $images = array();
        $publicDisk = Storage::disk('public');


        while (True){
            $imagePath = "images/{$id}-{$iterator}.png";
            if ($publicDisk->exists($imagePath)) {
                array_push($images, asset("storage/{$imagePath}"));
            } else {
                break;
            }
            $iterator++;
        }


        $sizes = DB::table('product_variations as pv')
            ->join('sizes as sz', 'pv.size_id', '=', 'sz.id')
            ->select('sz.*')
            ->distinct('sz.size_name')
            ->where('pv.product_id', '=', $id)
            ->get();

        $category = DB::table('categories')->where('id', $product->category_id)->value('category_name');
        $color = DB::table('colors')->where('id', $product->color_id)->value('color_name');

        $data = [
            'product' => $product,
            'images' => $images,
            'sizes' => $sizes,
            'category' => $category,
            'color' => $color
        ];

        return view('product', ['data' => $data]);
    }
}
