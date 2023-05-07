<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomepageController extends Controller
{
    public function index()
    {
        $mainCategories = DB::table('categories')
            ->whereIn('id', [1, 2, 3])->get();

        $menCategories = DB::table('categories')
            ->where('category_id', 1)->get();

        $womenCategories = DB::table('categories')
            ->where('category_id', 2)->get();

        $kidsCategories = DB::table('categories')
            ->where('category_id', 3)->get();

        $allIds = session('allIds ', []);

        $sales = DB::table('products')->inRandomOrder()->take(6)->get();
        $allIds = array_merge($allIds, $sales->pluck('id')->toArray());
        session(['allIds' => $allIds]);

        $new = DB::table('products')->whereNotIn('id', $allIds)
            ->inRandomOrder()
            ->take(6)
            ->get();
        $allIds = array_merge($allIds, $new->pluck('id')->toArray());
        session(['allIds' => $allIds]);

        $popular = DB::table('products')->whereNotIn('id', $allIds)
            ->inRandomOrder()
            ->take(6)
            ->get();
        $allIds = array_merge($allIds, $popular->pluck('id')->toArray());
        session(['allIds' => $allIds]);

        $i = 0;
        $statussale = true;
        $statusnew = false;

        $publicDisk = Storage::disk('public');
        foreach ($allIds as $oneid) {
            $imagePath = "images/{$oneid}-1.png";
            if ($publicDisk->exists($imagePath)) {
                if($i <= 5 && $statussale){
                    $sales[$i]->image_url = asset("storage/{$imagePath}");
                    if($i == 5){
                        $statussale = false;
                        $statusnew = true;
                        $i = -1;
                    }
                } elseif ($statusnew){
                    $new[$i]->image_url = asset("storage/{$imagePath}");
                    if($i == 5){
                        $statusnew = false;
                        $i = -1;
                    }
                }else{
                    $popular[$i]->image_url = asset("storage/{$imagePath}");
                }
            }
            $i++;
        }

        $data = [
            'mainCategories' => $mainCategories,
            'menCategories' => $menCategories,
            'womenCategories' => $womenCategories,
            'kidsCategories' => $kidsCategories,
            'new' => $new,
            'popular' => $popular,
            'sales' => $sales
        ];

        return view('homepage')->with('data', $data);
    }
}
