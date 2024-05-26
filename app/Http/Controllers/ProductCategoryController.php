<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_categories,name'],
            'description' => ['string', 'nullable'],
        ]);


        $category = ProductCategory::create([
            'name' => ucwords($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.category.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);

        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_categories,name,' . $category->id],
            'description' => ['string', 'nullable'],
        ]);

        $category->name = ucwords($request->name);
        $category->description = $request->description;

        $category->save();

        return redirect()->route('dashboard.category.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();

        return back();
    }

    public function toggle_status($id)
    {
        $category = ProductCategory::find($id);
        $category->status = !$category->status;
        $category->save();

        return back();
    }
}
