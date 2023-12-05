<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Orders;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $categories = MenuCategory::all();
        return view('admin.Pos', compact ('menus','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subtotal = $request->input('subtotal');
        $discountType = $request->input('discountType');
        $discountAmount = $request->input('discountAmount');
        $totalAfterDiscount = $request->input('totalAfterDiscount');
        $serviceCharge = $request->input('serviceCharge');
        $vat = $request->input('vat');
        $totalBill = $request->input('totalBill');
        // You may need to retrieve other form fields as well

        // Store the order in the database
        $order = new Orders();
        $order->status = 'Order Paid'; 
        $order->discount_type = $discountType;
        $order->discount_amount = $discountAmount; 
        $order->totalAfterDiscount = $totalAfterDiscount;
        $order->serviceCharge = $serviceCharge;
        $order->vat = $vat;
        $order->totalBill = $totalBill;
        // Set other necessary fields

        // Save the order
        $order->save();

        // Return a response (optional)
        return response()->json(['message' => 'Order stored successfully'], 200);

        return redirect()->route('pos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
