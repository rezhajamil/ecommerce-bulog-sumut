<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'product.warehouse', 'product.category', 'product.brand', 'product.unit'])->where('user_id', auth()->user()->id)->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::with(['warehouse', 'brand', 'category', 'unit'])->find($id);

        return view('order.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'zip_code' => ['required', 'numeric'],
        ]);

        $product = Product::find($request->product);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'receiver_name' => $request->name,
            'receiver_phone' => $request->phone,
            'receiver_province' => $request->province,
            'receiver_city' => $request->city,
            'receiver_address' => $request->address,
            'receiver_zip_code' => $request->zip_code,
            'subtotal' => $request->quantity * $product->price,
            'total_amount' => $request->quantity * $product->price,
            'status' => 'Menunggu Konfirmasi'
        ]);

        $product->stock = $product->stock - $request->quantity;
        $product->save();

        return redirect()->route('user.order.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return back();
    }
}
