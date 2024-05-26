<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => $url ?? '',
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
        $warehouse = $warehouse->with(['products'])->first();

        return view('dashboard.warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:warehouses,name,' . $warehouse->id],
            'phone' => ['numeric', 'nullable', 'unique:warehouses,phone,' . $warehouse->id],
            'email' => ['email', 'nullable', 'unique:warehouses,email,' . $warehouse->id],
            'address' => ['required', 'string'],
            'maps' => ['url', 'nullable'],
            'description' => ['string', 'nullable'],
            'image' => ['max:4096'],
        ]);

        if ($request->image) {
            $url = $request->image->store("warehouse");
            Storage::delete($warehouse->image);
        }

        $warehouse->name = strtoupper($request->name);
        $warehouse->phone = $request->phone;
        $warehouse->email = $request->email;
        $warehouse->address = $request->address;
        $warehouse->maps = $request->maps;
        $warehouse->description = $request->description;
        $warehouse->image = $url ?? $warehouse->image;

        $warehouse->save();

        return redirect()->route('dashboard.warehouse.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        Storage::delete($warehouse->image);

        $warehouse->delete();

        return back();
    }

    public function toggle_status($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->status = !$warehouse->status;
        $warehouse->save();

        return back();
    }
}
