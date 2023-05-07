<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        //Zobrazenie všetký produktov a zobrazenie pagination

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

        //Vymazanie produktu - softdelete v databáze a fyzické vymazanie z public storagu
        while (True) {
            $imagePath = "images/{$id}-{$iterator}.png";
            if ($publicDisk->exists($imagePath)) {
                $publicDisk->delete($imagePath);
            } else {
                break;
            }
            $iterator++;
        }
        $product->delete();

        $products = DB::table('products')->whereNull('deleted_at')->paginate(9);
        $totalItems = $products->total();
        // Získanie počtu objektov na stránke
        $itemsPerPage = $products->perPage();
        // Vypočítanie počtu objektov na poslednej stránke
        $itemsOnLastPage = $totalItems % $itemsPerPage;

        // Ak je $itemsOnLastPage rovný 0, znamená to, že posledná stránka je plná produktov
        if ($itemsOnLastPage == 0) {
            $itemsOnLastPage = $itemsPerPage;
        }

        if ($itemsOnLastPage == 9) {
            return redirect('/admin')->with('success', 'Produkt bol úspešné odobraný!');
        } else {
            return redirect()->back()->with('success', 'Produkt bol úspešné odobraný!');
        }
    }
}
