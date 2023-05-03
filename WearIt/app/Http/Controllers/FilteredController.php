<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class FilteredController extends Controller
{
    public function filtered(Request $request, $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // query na ziskanie vyfiltrovanych dat

        $products = DB::table('products as pr')
            ->select('pr.*')
            ->distinct('pr.product_name')
            ->where('pr.category_id', '=', $id)
            ->join('product_variations as pv', 'pr.id', '=', 'pv.product_id')
            ->join('colors as cl', 'cl.id', '=', 'pv.color_id')
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
