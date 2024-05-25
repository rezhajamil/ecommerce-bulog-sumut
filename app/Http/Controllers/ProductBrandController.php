<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = ProductBrand::all();

        return view('dashboard.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_brands,name'],
            'description' => ['string', 'nullable'],
        ]);


        $brand = ProductBrand::create([
            'name' => ucwords($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.brand.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = ProductBrand::find($id);

        return view('dashboard.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductBrand $brand)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_categories,name,' . $brand->id],
            'description' => ['string', 'nullable'],
        ]);

        $brand->name = ucwords($request->name);
        $brand->description = $request->description;

        $brand->save();

        return redirect()->route('dashboard.brand.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBrand $productBrand)
    {
        //
    }
}
