<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = ProductUnit::all();

        return view('dashboard.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_units,name'],
            'description' => ['string', 'nullable'],
        ]);


        $unit = ProductUnit::create([
            'name' => ucwords($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.unit.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductUnit $productUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = ProductUnit::find($id);

        return view('dashboard.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductUnit $unit)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:product_categories,name,' . $unit->id],
            'description' => ['string', 'nullable'],
        ]);

        $unit->name = ucwords($request->name);
        $unit->description = $request->description;

        $unit->save();

        return redirect()->route('dashboard.unit.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductUnit $productUnit)
    {
        //
    }
}
