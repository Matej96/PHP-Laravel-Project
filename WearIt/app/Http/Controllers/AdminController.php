<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {

        $products = DB::table('products')
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
            ->get();

        $sizes = DB::table('products as pr')
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
            ->select('sz.size_name')
            ->distinct()
            ->get();

        $count = $products->count();

        $data = [
            'sizes' => $sizes,
            'colors' => $colors,
            'products' => $products,
            'count' => $count
        ];

        return view('admin', ['data' => $data]);
    }

    public function removeData($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);

        $iterator = 1;
        $publicDisk = Storage::disk('public');


        while (True){
            $imagePath = "images/{$id}-{$iterator}.png";
            if ($publicDisk->exists($imagePath)) {
                $publicDisk->delete($imagePath);
            } else {
                break;
            }
            $iterator++;
        }

        $product->delete();

        $products = DB::table('products')->whereNull('deleted_at')->paginate(2);
        $totalItems = $products->total();
        // Získajte počet objektov na stránku
        $itemsPerPage = $products->perPage();
        // Vypočítajte počet objektov na poslednej stránke
        $itemsOnLastPage = $totalItems % $itemsPerPage;

        // Ak je $itemsOnLastPage rovný 0, znamená to, že posledná stránka je plná objektov
        if ($itemsOnLastPage == 0) {
            $itemsOnLastPage = $itemsPerPage;
        }

        // Ak je aktuálna stránka väčšia ako 1 a na stránke nie sú žiadne produkty
        if ($itemsOnLastPage == 2) {
            return redirect('/admin');
        } else {
            return redirect()->back()->with('success', 'Data has been removed successfully.');
        }
    }
}
