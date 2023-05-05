<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminaddController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = DB::table('categories')->get();
        $colors = DB::table('colors')->get();
        $sizes = DB::table('sizes')->get();


        return view('admin_add_product', [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }
    public function addProduct(Request $request)
    {

        // Validácia formulára
        $validatedData = $request->validate([
            'productName' => 'required|min:5|max:50',
            'productPrice' => 'required|numeric|gt:0',
            'productQuantity' => 'required|numeric|gt:0',
            'description' => 'required|min:250|max:2500',
            'formFileMultiple' => 'required|max:5',
            'formFileMultiple.*' => 'required|file|mimes:jpeg,jpg,png|between:50,2048',
            'formFileMultiple.*.uploaded' => 'required',
            'categoryPicker' => 'required',
            'sizePicker' => 'required',
            'colorPicker' => 'required',

        ], [
            'productName.required' => 'Názov produktu musí byť vyplnený',
            'productName.min' => 'Názov produktu musí mať minimálne :min znakov',
            'productName.max' => 'Názov produktu môže mať maximálne :max znakov',

            'productPrice.required' => 'Cena produktu musí byť vyplnená',
            'productPrice.numeric' => 'Cena produktu musí byť číslo',
            'productPrice.gt' => 'Cena produktu musí byť väčšia ako 0',

            'productQuantity.required' => 'Počet kusov musí byť vyplnené',
            'productQuantity.numeric' => 'Počet kusov musí byť číslo',
            'productQuantity.gt' => 'Počet kusov musí byť väčšia ako 0',

            'description.required' => 'Popis produktu musí byť vyplnený',
            'description.min' => 'Popis produktu musí mať minimálne :min znakov',
            'description.max' => 'Popis produktu môže mať maximálne :max znakov',

            'formFileMultiple.required' => 'Obrázok produktu musí byť vybraný',
            'formFileMultiple.max' => 'Maximalny pocet obrazkov je :max',

            'formFileMultiple.*.file' => 'Obrázok produktu musí byť súbor',
            'formFileMultiple.*.mimes' => 'Obrázok produktu musí byť vo formáte JPEG, JPG alebo PNG',
            'formFileMultiple.*.between' => 'Obrázok produktu musí mať veľkosť medzi :min a :max kilobajtov',
            'formFileMultiple.*.uploaded' => 'Súbor sa nepodarilo nahrať, skúste to prosím znova',

            'categoryPicker.required' => 'Kategória musí byť vybraná',

            'sizePicker.required' => 'Veľkosť musí byť vybraná',

            'colorPicker.required' => 'Farba musí byť vybraná',
        ]);

        $newProductId = DB::table('products')->insertGetId([
            'color_id' => $validatedData['colorPicker'],
            'category_id' => $validatedData['categoryPicker'],
            'product_name' => $validatedData['productName'],
            'product_description' => $validatedData['description'],
            'created_at' => now(),
            'updated_at' => now(),
            'price' => $validatedData['productPrice']
        ]);

        $sizeIds = $validatedData['sizePicker'];

        foreach ($sizeIds as $sizeId) {
            DB::table('product_variations')->insert([
                'product_id' => $newProductId,
                'size_id' => $sizeId,
                'quantity' => $validatedData['productQuantity']
            ]);
        }


        if ($request->hasFile('formFileMultiple')) {
            $publicDisk = Storage::disk('public');
            $i = 1;

            foreach ($request->file('formFileMultiple') as $image) {

                $imageName = $newProductId . '-' . $i . '.' .$image->getClientOriginalExtension();
                $publicDisk->put("images/$imageName", file_get_contents($image));
                $i++;
            }
        }

        // Návrat užívateľa na stránku s oznámením o úspešnom uložení
        return redirect()->route('admin')->with('success', 'Produkt bol úspešne uložený.');
    }
}
