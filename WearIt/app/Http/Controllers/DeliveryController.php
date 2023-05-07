<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\HouseNumber;
use App\Models\Person;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index(Request $request){
        $validatedData = $request->input('order');


        $products = DB::table('product_variations')
            ->select('products.id', 'product_variation_id', 'product_name', 'size_name', 'price', 'amount', 'color_name')
            ->join('products', 'product_variations.product_id', '=', 'products.id')
            ->join('cart_products', 'product_variations.id', '=', 'cart_products.product_variation_id')
            ->join('carts', 'carts.id', '=', 'cart_products.cart_id')
            ->join('sizes', 'sizes.id', '=', 'product_variations.size_id')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
            ->get();

        $total_price = 0;

        foreach ($products as $product){
            $total_price += $product->amount * $product->price;
        }

        $transport = DB::table('transports')
            ->where('id', '=', $validatedData['selected_transport'])
            ->first();

        $payment = DB::table('payments')
            ->where('id', '=', $validatedData['selected_payment'])
            ->first();

        $total_price += $transport->price;
        $total_price += $payment->price;


        $card_id = DB::table('carts')
            ->select('id')
            ->where('user_id', '=', auth()->user()->getAuthIdentifier())
            ->value('id');

        DB::table('cart_products')
            ->where('cart_id', '=', $card_id)
            ->delete();

        $country = Country::firstOrCreate(
            ['name' => $validatedData['country']]
        );

        $city = City::firstOrCreate(
            ['name' => $validatedData['city']], // Podmienky na vyhľadávanie
            ['postal_code' => $validatedData['prc']] // Hodnoty pre vytvorenie nového záznamu
        );

        $street = Street::firstOrCreate(
            ['name' => $validatedData['street']],
        );

        $house_number = HouseNumber::firstOrCreate(
            ['value' => $validatedData['house_number']],
        );

        $person = Person::firstOrCreate(
            ['first_name' => $validatedData['first_name'],
             'last_name' => $validatedData['last_name']],
        );

        $order_id = DB::table('orders')
            ->insertGetId([
                'user_id' => auth()->user()->getAuthIdentifier(),
                'payment_id' => $validatedData['selected_payment'],
                'transport_id' => $validatedData['selected_transport'],
                'total_price' => $total_price,
                'city_id' => $city->id,
                'street_id' => $street->id,
                'house_number_id' => $house_number->id,
                'person_id' => $person->id,
                'country_id' => $country->id,
                'created_at' => now()
            ]);

        foreach ($products as $product){
            DB::table('product_orders')
                ->insert([
                    'order_id' => $order_id,
                    'product_variation_id' => $product->product_variation_id,
                    'amount' => $product->amount,
                    'price' => $product->price,
                ]);
        }

        return redirect('/')->with('success', 'Objednávka bola vytvorená');
    }
}
