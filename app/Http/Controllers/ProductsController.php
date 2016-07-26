<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductsController extends Controller
{
    public function getProducts()
    {
        return view('products.index');
    }

    public function postProduct(Request $request)
    {
        $newProduct = new Product;
        $newProduct->product_name = $request->input('product_name');
        $newProduct->product_description = $request->input('product_description');
        $newProduct->product_price = $request->input('product_price');

        $request->user()->store()->products()->save($newProduct);
    }
}
