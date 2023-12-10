<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;

use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function ordersChef()
    {
        $today = Carbon::today()->format('F j, Y');
        $orders = Orders::with(['orderItems.menu', 'user'])
        ->where('status', 'Order Paid')
        ->get();

        $ordersCount = $orders->count();

        return view('admin.ordersChef', compact('orders', 'ordersCount', 'today'));
    }
    public function updateOrderStatusCooked($orderId)
{
    $order = Orders::find($orderId);
    // Update the status of orders with 'Order Paid' to 'Order Cooked'
    if ($order) {
        $order->status = 'Order Cooked';
        $order->save();
        
        return response()->json(['message' => 'Order status updated successfully'], 200);
    }

}

    public function ordersWaiter()
    {
        $today = Carbon::today()->format('F j, Y');
        $orders = Orders::with(['orderItems.menu', 'user'])
        ->where('status', 'Order Cooked')
        ->get();

        $orders2 = Orders::with(['orderItems.menu', 'user'])
        ->where('status', 'Order Served')
        ->get();

        $ordersCount = $orders->count();
        $ordersCount2 = $orders2->count();

        return view('admin.ordersWaiter', compact('orders', 'orders2','ordersCount','ordersCount2', 'today'));
    }

    public function updateOrderStatusServed($orderId)
    {
        $order = Orders::find($orderId);
    // Update the status of orders with 'Order Paid' to 'Order Cooked'
    if ($order) {
        $order->status = 'Order Served';
        $order->save();
        
        return response()->json(['message' => 'Order status updated successfully'], 200);
    }
    
    }

    public function updateOrderStatusCompleted($orderId)
    {
        $order = Orders::find($orderId);
    // Update the status of orders with 'Order Paid' to 'Order Cooked'
    if ($order) {
        $order->status = 'Order Completed';
        $order->save();

        if ($order->table) {
            $order->table->status = 'Available';
            $order->table->save();
        }
        
        return response()->json(['message' => 'Order status updated successfully'], 200);
    }
    
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
    public function store(StoreOrdersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
