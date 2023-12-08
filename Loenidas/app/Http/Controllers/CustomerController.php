<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Orders;
use App\Models\OrdersItems;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        return view("customer.home");
    } 

    public function customerMenu()
    {
  
        $menus = Menu::all();
        $categories = MenuCategory::all();
        return view('customer.customerMenu', compact ('menus','categories'));

    }
    public function storeOrder(Request $request){
        $subtotal = $request->input('subtotal');
        $discountType = $request->input('discountType');
        $discountAmount = $request->input('discountAmount');
        $totalAfterDiscount = $request->input('totalAfterDiscount');
        $serviceCharge = $request->input('serviceCharge');
        $vat = $request->input('vat');
        $totalBill = $request->input('totalBill');
    
    
        $order = new Orders();
        $order->status = 'Order Paid';
        $order->discount_type = $discountType;
        $order->discount_amount = $discountAmount;
        $order->totalAfterDiscount = $totalAfterDiscount;
        $order->serviceCharge = $serviceCharge;
        $order->vat = $vat;
        $order->totalBill = $totalBill;
    
        $order->save();
    
        $orderItems = $request->input('orderItems');
        if ($orderItems) {
            foreach ($orderItems as $item) {
                $orderItem = new OrdersItems(); 
                $orderItem->order_id = $order->id; 
                $orderItem->menu_id = $item['menuId'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->menu_price = $item['menuPrice'];
                $orderItem->total_price = $item['totalPrice'];
    
                $orderItem->save();
            }
        }
    
        return redirect()->route('pos.index');
    }

    public function customerCart()
    {

        $user = auth()->id();

        $customerCarts = Orders::with('user', 'menu')
        ->where('user_id', $user)
        ->where('status', 'Order Cart')
        ->get();

        $customerOrder = Orders::where('user_id', $user)
        ->where('status', 'Order Cart')
        ->whereDate('created_at', today())
        ->count();

        return view("customer.customerCart", compact('customerCarts', 'customerOrder'));
    } 

    public function addToCart(Request $request)
    {
        $user_id = auth()->user()->id; // Assuming you are using authentication
        $menu_id = $request->input('menu_id');

        // Save the order in the orders table with status 'Order Cart'
        Orders::create([
            'user_id' => $user_id,
            'menu_id' => $menu_id,
            'status' => 'Order Cart',
        ]);

        alert()->success('Success');

        // You can add a success message or redirect back to the menu page
        return back();
    }

    public function updateQuantity(Request $request)
    {
        // Loop through each order data and update the database
        foreach ($request->input('orders') as $orderData) {
            $orderId = $orderData['orderId'];
            $quantity = $orderData['quantity'];

            // Update the order in the database
            $order = Orders::find($orderId);

            $price = $order->menu->price;
            $totalprice = $price * $quantity;

            if ($order) {
                $order->quantity = $quantity;
                $order->status = 'Order Placed';
                $order->total_price_per_order = $totalprice;
                $order->save();
            }
        }
    } 

    public function customerReservation()
    {
        return view("customer.customerReservation");
    } 
    public function customerHistory()
    {
        return view("customer.customerHistory");
    } 



}
