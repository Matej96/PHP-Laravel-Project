<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminaddController extends Controller
{
    public function index($id = null): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = DB::table('categories')->get();
        $colors = DB::table('colors')->get();
        $sizes = DB::table('sizes')->get();
        $product = null;
        $product_id = null;
        $variation = null;
        $disableQuantity = false;
        $allnewFilename = [];

        // Ak $id nie je null čiže používateľ klikol na upravenie produktu a nie vytvorenie nového produktu
        if ($id) {
            $disableQuantity = true;
            $product = DB::table('products')->where('id', $id)->first();
            $product_id = $product->id;
            $variation = DB::table('product_variations')->where('product_id', $product->id)->get();
            // Po odstránení obrázka sa zistia názvý novo premenovaných obrázkov
            $imageUrls = glob(public_path("storage/images/{$id}-*.png"));
            foreach ($imageUrls as $index => $image) {
                $newFilename = $id . '-' . ($index + 1) . '.png';
                $allnewFilename[] = $newFilename;

            }
        }

        return view('admin_add_product', [
            'product_id' => $product_id,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'images' => $allnewFilename,
            'product' => $product,
            'variations' => $variation,
            'disableQuantity' => $disableQuantity,
        ]);
    }

    public function addProduct(Request $request, $id = null)
    {

        $rules_main = [
            'productName' => 'required|min:5|max:50',
            'productPrice' => 'required|numeric|gt:0',
            'description' => 'required|min:250|max:2500',
            'formFileMultiple' => 'required|max:5',
            'formFileMultiple.*' => 'required|file|mimes:png|between:50,2048',
            'formFileMultiple.*.uploaded' => 'required',
            'categoryPicker' => 'required',
            'colorPicker' => 'required',
        ];
        $rules_main_response = [
            'productName.required' => 'Názov produktu musí byť vyplnený',
            'productName.min' => 'Názov produktu musí mať minimálne :min znakov',
            'productName.max' => 'Názov produktu môže mať maximálne :max znakov',

            'productPrice.required' => 'Cena produktu musí byť vyplnená',
            'productPrice.numeric' => 'Cena produktu musí byť číslo',
            'productPrice.gt' => 'Cena produktu musí byť väčšia ako 0',

            'description.required' => 'Popis produktu musí byť vyplnený',
            'description.min' => 'Popis produktu musí mať minimálne :min znakov',
            'description.max' => 'Popis produktu môže mať maximálne :max znakov',

            'formFileMultiple.required' => 'Obrázok produktu musí byť vybraný',
            'formFileMultiple.max' => 'Maximalny pocet obrazkov je :max',

            'formFileMultiple.*.file' => 'Obrázok produktu musí byť súbor',
            'formFileMultiple.*.mimes' => 'Obrázok produktu musí byť vo formáte PNG',
            'formFileMultiple.*.between' => 'Obrázok produktu musí mať veľkosť medzi :min a :max kilobajtov',
            'formFileMultiple.*.uploaded' => 'Súbor sa nepodarilo nahrať, skúste to prosím znova',

            'categoryPicker.required' => 'Kategória musí byť vybraná',

            'colorPicker.required' => 'Farba musí byť vybraná',
        ];
        // Ak $id nie je null čiže používateľ klikol na upravenie produktu a nie vytvorenie nového produktu
        if ($id != null) {
            $rules_update = [
                'productCount2' => 'required',
                'productSizes2' => 'required',
            ];
            $rules_update_response = [
                'productCount2.required' => 'Počet kusov musí byť vyplnené',
                'productSizes2.required' => 'Veľkosť musí byť vyplnená',
            ];
            $rules_main = array_merge($rules_main, $rules_update);
            $rules_main_response = array_merge($rules_main_response, $rules_update_response);
        } else {
            $rules_add = [
                'sizePicker' => 'required',
                'productQuantity' => 'required|numeric|gt:0',
            ];
            $rules_add_response = [
                'productQuantity.required' => 'Počet kusov musí byť vyplnené',
                'productQuantity.numeric' => 'Počet kusov musí byť číslo',
                'productQuantity.gt' => 'Počet kusov musí byť väčšia ako 0',

                'sizePicker.required' => 'Veľkosť musí byť vybraná',
            ];

            $rules_main = array_merge($rules_main, $rules_add);
            $rules_main_response = array_merge($rules_main_response, $rules_add_response);
        }

        // Kontrola validácie dát od používateľa
        $validatedData = $request->validate($rules_main, $rules_main_response);

        // If - ak upravuje už vznikuný produkt tak updatne hodnoty v databáze
        if ($id != null) {
            DB::table('products')->where('id', $id)->update([
                'color_id' => $validatedData['colorPicker'],
                'category_id' => $validatedData['categoryPicker'],
                'product_name' => $validatedData['productName'],
                'product_description' => $validatedData['description'],
                'updated_at' => now(),
                'price' => $validatedData['productPrice']
            ]);

            $allSizes = $validatedData['productSizes2'];
            $allCounts = $validatedData['productCount2'];

            for ($i = 0; $i < count($allSizes); $i++) {
                DB::table('product_variations')->where('product_id', $id)
                    ->where('size_id', $allSizes[$i])
                    ->update([
                        'quantity' => $allCounts[$i]
                    ]);
            }
            // Potom ak pridá nové obrázky tak sa pridajú do public storage a ich názov sa zmený na základe obrázkov ktoré už sú v danom storage
            if ($request->hasFile('formFileMultiple')) {

                $publicDisk = Storage::disk('public');
                $files = glob(public_path("storage/images/{$id}-*.png"));
                $filename = basename(end($files));
                // Extrakcia čísla variacie obrázka
                $variation = intval(str_replace("{$id}-", "", pathinfo($filename, PATHINFO_FILENAME)));
                $i = $variation + 1;

                foreach ($request->file('formFileMultiple') as $image) {

                    $imageName = $id . '-' . $i . '.' . $image->getClientOriginalExtension();
                    $publicDisk->put("images/$imageName", file_get_contents($image));
                    $i++;
                }
            }

            return redirect()->route('admin')->with('success', 'Produkt bol úspešne zmenený.');
        } else { // Táto časť kódu sa vykoná ak sa pridáva nový produkt
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

                    $imageName = $newProductId . '-' . $i . '.' . $image->getClientOriginalExtension();
                    $publicDisk->put("images/$imageName", file_get_contents($image));
                    $i++;
                }
            }


            return redirect()->route('admin')->with('success', 'Produkt bol úspešne uložený.');
        }
    }

    public function removeImage(Request $request)
    {
        $id_image = $request->get('id');
        $publicDisk = Storage::disk('public');
        $imagePath = "images/$id_image";

        // Kontrola či daný obrazok existuje
        if ($publicDisk->exists($imagePath)) {
            $allnewFilename = [];

            // Vymazanie obrázka
            $publicDisk->delete($imagePath);

            // Extrakcia ID z názva obrázku
            $id = explode('-', $id_image)[0];

            // Zistenie všetkých obrázkov ktoré začínajú na dané id
            $images = glob(public_path("storage/images/{$id}-*.png"));

            foreach ($images as $index => $image) {
                $newFilename = $id . '-' . ($index + 1) . '.png';
                $allnewFilename[] = $newFilename;

                // Premenovanie obrázkov s daným ID
                $publicDisk->move("images/" . basename($image), "images/$newFilename");
            }
            return response()->json(['success' => true,
                'filenames' => $allnewFilename]);
        }

        return response()->json(['success' => false]);
    }
}
