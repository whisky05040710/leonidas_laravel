<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\Reservations;
use App\Models\Tables;

class PosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $menus = Menu::where('menuStatus', 'Available')->get();
    $categories = MenuCategory::all();
    $confirms = Reservations::
    whereDate('created_at', today())
        ->where('status', 'Confirm')
        ->get();
      $availableTables = Tables::where('status', 'Available')->get();

    return view('admin.pos', compact('menus', 'categories', 'confirms', 'availableTables'));
  }
  

  public function reservationPOS($id){
    $reservationID = Reservations::find($id);
    $orders = Orders::where('reservation_id', $reservationID->id)
        ->with('orderItems.menu') // Eager load relationships
        ->get();

    $subtotal = 0;

        foreach ($orders as $order) {
            $subtotal += $order->orderItems->sum('total_price');
        }

    $firstOrder = $orders->first();
    $discountType = $firstOrder ? $firstOrder->discountType : null;

    if ($discountType === 'Senior Citizen' || $discountType === 'PWD') {
      $discount = $subtotal * 0.10;
  } else {
      // If discountType is null or 'None', apply no discount
      $discount = 0;
  }

    // Calculate subtotal after discount
    $subtotalAfterDiscount = $subtotal - $discount;

    $serviceCharge = $subtotalAfterDiscount * 0.10;

    // Calculate VAT (12% of the subtotal after discount)
    $vat = $subtotalAfterDiscount * 0.12;

    // Calculate total bill
    $totalBill = $subtotalAfterDiscount + $serviceCharge + $vat;


    return view('admin.reservationPOS', compact('orders', 'subtotal', 'discount', 'discountType', 
    'subtotalAfterDiscount', 'serviceCharge', 'vat', 'totalBill', 'reservationID'));
  }

  public function updateOrderStatus($id)
{
  $reservationID = Reservations::find($id);
    $orders = Orders::where('reservation_id', $reservationID->id)->first();
    $reservationID->status = 'Completed';
    $reservationID->save();
    
    $orders->status = 'Order Paid';
    $orders->save();


  return redirect()->route('pos.index')->with('success', 'Orders updated successfully');
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
        $discountType = $request->input('discountType');
        $totalBill = $request->input('totalBill');
        $table_id = $request->input('table_id');
    
    
        $order = new Orders();
        $order->status = 'Order Paid';
        $order->discountType = $discountType;
        $order->totalBill = $totalBill;
        $order->table_id = $table_id;
    
        $order->save();

        $table = Tables::find($table_id);
        if ($table) {
        $table->status = 'Occupied';
        $table->save();
        }
    
        $orderItems = $request->input('orderItems');
        if ($orderItems) {
            foreach ($orderItems as $item) {
                $orderItem = new OrdersItems(); 
                $orderItem->order_id = $order->id; 
                $orderItem->menu_id = $item['menuId'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->total_price = $item['totalPrice'];
    
                $orderItem->save();
            }
        }

        // Fetch the table ID from the request
    $tableId = $request->input('table_id');

    // Update the table status to 'Occupied'
    $table = Tables::find($tableId);
    if ($table) {
        $table->status = 'Occupied';
        $table->save();
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
