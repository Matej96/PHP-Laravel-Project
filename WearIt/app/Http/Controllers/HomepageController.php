<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $mainCategories = DB::table('categories')
                            ->whereIn('id', [1,2,3])->get();

        $menCategories = DB::table('categories')
                            ->where('category_id', 1)->get();

        $womenCategories = DB::table('categories')
            ->where('category_id', 2)->get();

        $kidsCategories = DB::table('categories')
            ->where('category_id', 3)->get();

        $data = [
            'mainCategories' => $mainCategories,
            'menCategories' => $menCategories,
            'womenCategories' => $womenCategories,
            'kidsCategories' => $kidsCategories
        ];

        return view('homepage')->with('data', $data);
    }
}
