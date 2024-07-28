<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProducts(){
        $products = Product::all();
        return view('admin.products.listProducts')->with(['products' => $products]);
    }

    public function addProduct(){
        return view('admin.products.addProduct');
    }
}
