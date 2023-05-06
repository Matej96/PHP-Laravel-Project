<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilteredController extends Controller
{

    public function get_colors($id=0, $word=''): \Illuminate\Support\Collection
    {
        if($id != 0){
            return DB::table('products as pr')
                ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
                ->join('colors as cl', 'cl.id', '=', 'pr.color_id')
                ->select('cl.color_name', 'cl.hex_value')
                ->distinct()
                ->where('pr.category_id', '=', $id)
                ->get();
        }else{
            return DB::table('products as pr')
                ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
                ->join('colors as cl', 'cl.id', '=', 'pr.color_id')
                ->select('cl.color_name', 'cl.hex_value')
                ->distinct()
                ->where('pr.product_name', 'LIKE', '%'.$word.'%')
                ->get();
        }
    }

    public function get_sizes($id=0, $word=''): \Illuminate\Support\Collection
    {
        if($id != 0){
            return DB::table('products as pr')
                ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
                ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
                ->select('sz.size_name')
                ->distinct()
                ->where('pr.category_id', '=', $id)
                ->get();
        }else{
            return DB::table('products as pr')
                ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
                ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
                ->select('sz.size_name')
                ->distinct()
                ->where('pr.product_name', 'LIKE', '%'.$word.'%')
                ->get();
        }
    }


    public function filtered(Request $request, $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // query na ziskanie vyfiltrovanych dat

        $products = DB::table('products as pr')
            ->select('pr.*')
            ->distinct('pr.id')
            ->where('pr.category_id', '=', $id)
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('colors as cl', 'cl.id', '=', 'pr.color_id')
            ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
            ->when($request->input('colors'), function ($query, $colors) {
                return $query->whereIn('cl.color_name', $colors);
            })
            ->when($request->input('sizes'), function ($query, $sizes) {
                return $query->whereIn('sz.size_name', $sizes);
            })
            ->when($request->input('min-price') && $request->input('max-price'), function ($query) use ($request) {
                return $query->whereBetween('pr.price', [$request->input('min-price'), $request->input('max-price')]);
            });

        // subquery, pretoze distinct a order by stlpce sa lisia + nastavenie strankovania
        if($request->input('order')){
            $order = '';
            if($request->input('order') == 'most_expensive'){
                $order = 'desc';
            }else if($request->input('order') == 'cheapest'){
                $order = 'asc';
            }

            $products = DB::table($products, 'sq')
                ->orderBy('sq.price', $order)
                ->paginate(9)
                ->appends(request()->query());
        }else{
            $products = $products
                ->paginate(9)
                ->appends(request()->query());
        }

        $count = $products->count();

        $colors = $this->get_colors($id);

        $sizes = $this->get_sizes($id);

        foreach ($products as $product) {
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }
        $category = DB::table('categories')->where('id', $id)->value('category_name');
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

    public function search(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $word = $request->input('search');

        $all_products = DB::table('products')
            ->where('product_name', 'LIKE', '%'.$word.'%');

        $products = $all_products->paginate(9)->appends(request()->query());

        $sizes = $this->get_sizes(0, $word);

        $colors = $this->get_colors(0, $word);

        foreach ($products as $product) {
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }

        $data = [
            'all' => $all_products,
            'products' => $products,
            'sizes' => $sizes,
            'colors' => $colors,
            'word' => $word
        ];

        return view('search_list', ['data' => $data]);
    }

    public function search_filter(Request $request, $word): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = DB::table('products as pr')
            ->select('pr.*')
            ->distinct('pr.id')
            ->where('product_name', 'LIKE', '%'.$word.'%')
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('colors as cl', 'cl.id', '=', 'pr.color_id')
            ->join('sizes as sz', 'sz.id', '=', 'pv.size_id')
            ->when($request->input('colors'), function ($query, $colors) {
                return $query->whereIn('cl.color_name', $colors);
            })
            ->when($request->input('sizes'), function ($query, $sizes) {
                return $query->whereIn('sz.size_name', $sizes);
            })
            ->when($request->input('min-price') && $request->input('max-price'), function ($query) use ($request) {
                return $query->whereBetween('pr.price', [$request->input('min-price'), $request->input('max-price')]);
            });

        // subquery, pretoze distinct a order by stlpce sa lisia + nastavenie strankovania
        if($request->input('order')){
            $order = '';
            if($request->input('order') == 'most_expensive'){
                $order = 'desc';
            }else if($request->input('order') == 'cheapest'){
                $order = 'asc';
            }

            $products = DB::table($products, 'sq')
                ->orderBy('sq.price', $order)
                ->paginate(9)
                ->appends(request()->query());
        }else{
            $products = $products
                ->paginate(9)
                ->appends(request()->query());
        }

        foreach ($products as $product) {
            $imagePath = "images/{$product->id}-1.png";
            $publicDisk = Storage::disk('public');

            if ($publicDisk->exists($imagePath)) {
                $product->image_url = asset("storage/{$imagePath}");
            } else {
                $product->image_url = null;
            }
        }

        $colors = $this->get_colors(0, $word);

        $sizes = $this->get_sizes(0, $word);
        $data = [
            'products' => $products,
            'sizes' => $sizes,
            'colors' => $colors,
            'word' => $word,
        ];

        return view('search_list', ['data' => $data]);
    }
}
