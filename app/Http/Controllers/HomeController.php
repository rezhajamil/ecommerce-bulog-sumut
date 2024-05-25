<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['warehouse', 'brand', 'category', 'unit'])->get();

        return view('home', compact('products'));
    }
}
