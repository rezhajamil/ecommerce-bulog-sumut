<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();

        return view('dashboard.warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:warehouses,name'],
            'phone' => ['numeric', 'nullable', 'unique:warehouses,phone'],
            'email' => ['email', 'nullable', 'unique:warehouses,email'],
            'address' => ['required', 'string'],
            'maps' => ['url', 'nullable'],
            'description' => ['string', 'nullable'],
            'image' => ['max:4096'],
        ]);

        if ($request->image) {
            $url = $request->image->store("warehouse");
        }

        $warehouse = Warehouse::create([
            'name' => strtoupper($request->name),
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'maps' => $request->maps,
            'description' => $request->description,
            'image' => $url,
        ]);

        return redirect()->route('dashboard.warehouse.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
