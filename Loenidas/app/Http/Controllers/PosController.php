<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Orders;
use App\Models\OrdersItems;

class PosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $menus = Menu::all();
    $categories = MenuCategory::all();
    return view('admin.pos', compact('menus', 'categories'));
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
    $orderItems = $request->input('orderItems'); // Assuming order items are sent as an array from the frontend
    $posId = uniqid(); // Generate a unique POS ID for this group of orders

    foreach ($orderItems as $item) {
        $order = new Orders();
        $order->user_id = null; // User ID is null for orders placed via POS
        $order->menu_id = $item['menuId'];
        $order->status = 'Order Paid';
        $order->quantity = $item['quantity'];
        $order->total_price_per_order = $item['totalPrice']; // Assuming this is the total price per menu item
        $order->pos_id = $posId;

        $order->save();
    }

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
