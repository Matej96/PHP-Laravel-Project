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

        $colors = DB::table('product_variations as pv')
            ->join('colors as cl', 'pv.color_id', '=', 'cl.id')
            ->select('cl.color_name')
            ->distinct()
            ->where('pv.product_id', '=', $id)
            ->get();

        $sizes = DB::table('product_variations as pv')
            ->join('sizes as sz', 'pv.size_id', '=', 'sz.id')
            ->select('sz.size_name')
            ->distinct('sz.size_name')
            ->where('pv.product_id', '=', $id)
            ->get();

        $data = [
            'product' => $product,
            'images' => $images,
            'colors' => $colors,
            'sizes' => $sizes
        ];

        return view('product', ['data' => $data]);
    }
}
