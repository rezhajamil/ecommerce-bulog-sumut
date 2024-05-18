<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        $units = ProductUnit::all();
        $warehouses = Warehouse::all();

        return view('dashboard.product.create', compact('warehouses', 'categories', 'brands', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'warehouse' => ['required'],
            'category' => ['required'],
            'brand' => ['required'],
            'unit' => ['required'],
            'description' => ['string', 'nullable'],
            'stock' => ['string', 'numeric'],
            'price' => ['string', 'numeric'],
            'image' => ['required', 'max:4096'],
        ]);

        if ($request->image) {
            $url = $request->image->store("product_images");
        }

        $product = Product::create([
            'name' => strtoupper($request->name),
            'warehouse' => $request->warehouse,
            'category' => $request->category,
            'brand' => $request->brand,
            'unit' => $request->unit,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $url,
        ]);

        return redirect()->route('dashboard.product.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
