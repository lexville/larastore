<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Store;
use App\Product;

class ProductsController extends Controller
{
    public function getProducts()
    {
        return view('products.create');
    }

    public function postProduct(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $newProduct = new Product;
        $newProduct->product_name = $request->input('product_name');
        $newProduct->product_description = $request->input('product_description');
        $newProduct->product_price = $request->input('product_price');
        $newProduct->store_id = $store->id;
        $newProduct->user_id = auth()->user()->id;

        $newProduct->save();
    }
}
