<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\Reservations;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view("customer.home");
    } 

    public function customerMenu()
    {
  
        $menus = Menu::where('menuStatus', 'Available')->get();
        $categories = MenuCategory::all();
        return view('customer.customerMenu', compact ('menus','categories'));

    }
    // public function storeOrder(Request $request){
    //     $discountType = $request->input('discountType');
    //     $totalAfterDiscount = $request->input('totalAfterDiscount');
    //     $totalBill = $request->input('totalBill');
    
    
    //     $order = new Orders();
    //     $order->status = 'Order Paid';
    //     $order->discount_type = $discountType;
    //     $order->totalBill = $totalBill;
    
    //     $order->save();
    
    //     $orderItems = $request->input('orderItems');
    //     if ($orderItems) {
    //         foreach ($orderItems as $item) {
    //             $orderItem = new OrdersItems(); 
    //             $orderItem->order_id = $order->id; 
    //             $orderItem->menu_id = $item['menuId'];
    //             $orderItem->quantity = $item['quantity'];
    //             $orderItem->total_price = $item['totalPrice'];
    
    //             $orderItem->save();
    //         }
    //     }
    
    //     return redirect()->route('pos.index');
    // }

    public function customerCart()
    {
        $user_id = auth()->id();
    
        $orderID = Orders::where('user_id', $user_id)
            ->where('status', 'Order Cart')
            ->first();

        $customerCarts = Orders::where('user_id', $user_id)
            ->where('status', 'Order Cart')
            ->get();
    
        $orderIds = $customerCarts->pluck('id')->toArray();
    
        $orderItems = OrdersItems::whereIn('order_id', $orderIds)
            ->with('menu')
            ->get();
    
        $customerCarts->transform(function ($order) use ($orderItems) {
            $order->orderItems = $orderItems->where('order_id', $order->id);
            return $order;
        });
    
        $customerOrder = Orders::where('user_id', $user_id)
            ->where('status', 'Order Cart')
            ->whereDate('created_at', today())
            ->count();
    
        return view("customer.customerCart", compact('customerCarts', 'customerOrder', 'orderID'));
    }
    
    public function addToCart(Request $request)
    {
        $user_id = auth()->user()->id;
    $menu_id = $request->input('menu_id');

    // Check if there is an 'Order Cart' for the user
    $cartOrder = Orders::where('user_id', $user_id)->where('status', 'Order Cart')->first();

    if ($cartOrder !== null) {
        // If an 'Order Cart' already exists, add the item to the existing order
        OrdersItems::create([
            'order_id' => $cartOrder->id,
            'menu_id' => $menu_id,
        ]);
    } else {
        // If no 'Order Cart' exists, create a new order
        $order = Orders::create([
            'user_id' => $user_id,
            'status' => 'Order Cart',
        ]);

        // Add the item to the newly created order
        OrdersItems::create([
            'order_id' => $order->id,
            'menu_id' => $menu_id,

        ]);
    }

    alert()->success('Success');
    
    return back();
    }

    public function deleteToCart(Request $request)
    {
        $order_id = $request->input('order_id');
        $order = Orders::find($order_id);
        $order->delete();

    }
    
    public function updateOrderDetails(Request $request)
{
    $discountType = $request->input('discountType');
    $totalBill = $request->input('totalBill');

    Orders::where('status', 'Order Cart')->update([
        'status' => 'Order Placed',
        'discountType' => $discountType,
        'totalBill' => $totalBill
    ]);

    
    $menuQuantity = $request->input('menuQuantity');

foreach ($menuQuantity as $menuId => $quantity) {
    // Retrieve the OrdersItems record based on the menuId
    $orderItem = OrdersItems::where('id', $menuId)->first();

    if ($orderItem) {
        $orderItem->quantity = $quantity; // Update quantity
        $orderItem->total_price = $orderItem->menu->price * $quantity; // Recalculate total price
        $orderItem->save(); // Save changes to the database
    }
}

return response()->json(['message' => 'Order items updated successfully']);

    
}


    public function updateQuantitypos(Request $request)
    {
        $cartItems = $request->input('cartItems');

        // Assuming $cartItems is an array of order data
            // Generate a unique identifier (UUID) for the Point of Sale (POS)
    $posId = Uuid::uuid4()->toString();
    
        // Save orders in the database
        foreach ($cartItems as $item) {
            $menuId = $item['menuId'];
            $quantity = $item['quantity'];

            $menu = Menu::find($menuId);

            $price = $menu->price;
            $totalprice = $price * $quantity;

            $order = new Orders();
            $order->menu_id = $item['menuId'];
            $order->quantity = $item['quantity'];
            $order->total_price_per_order = $totalprice;
            $order->status = 'Order Paid';
            $order->pos_id = $posId; // Assign the same pos_id to all orders in this transaction
            // Add any other necessary fields
            $order->save();

            
        }

    // Return a response (you can customize this based on your needs)
    return response()->json(['message' => 'Order saved successfully']);
    }

    public function customerReservation()
    {
        $user_id = auth()->id();
 
        $order = Orders::where('user_id', $user_id)
        ->where('status', 'Order Placed')
        ->latest('updated_at')
        ->first();
    
        return view("customer.customerReservation", compact('order'));
    }

    public function storeReservation(Request $request)
    {

        $validatedData = $request->validate([
            'phoneNum' => 'required|numeric',
            'date' => 'required|date_format:d-m-Y',
            'people' => 'required|numeric',
            'time' => ['required', function ($attribute, $value, $fail) {
                $parsedTime = date_parse($value);
        
                // Check if time is in the allowed range (7:00 AM - 9:00 PM)
                if (!($parsedTime['hour'] >= 7 && $parsedTime['hour'] < 21)) {
                    $fail('The time must be between 7:00 AM and 9:00 PM.');
                }
            }],
            
        ], [
            'date.required' => 'The date field is required.', 
            'phoneNum.required' => 'The phone number field is required.',
            'people.required' => 'The date field is required.',
        ]);

        // Retrieve reservation data
        $phoneNum = $validatedData['phoneNum'];
        $inputDate = $validatedData['date'];
        $date = \DateTime::createFromFormat('d-m-Y', $inputDate)->format('Y-m-d');
        $people = $validatedData['people'];
        $time = $validatedData['time'];
    
        // Create a new reservation
        $reservation = new Reservations();
        $reservation->phoneNum = $phoneNum;
        $reservation->people = $people;
        $reservation->time = $time;
        $reservation->date = $date;
        $reservation->user_id = auth()->id();
        $reservation->save();
    
        $orderId = $request->input('order_id');
    
        $order = Orders::find($orderId);

        if ($order) {
            logger("Before Update - Reservation ID: " . $reservation->id);
            logger("Before Update - Order ID: " . $orderId);
    
            // Assuming $reservation->id contains the desired reservation ID
            $order->reservation_id = $reservation->id;
            $order->save();
    
            logger("After Update - Reservation ID: " . $reservation->id);
            logger("After Update - Order ID: " . $orderId);
    
            // Other logic for storing the reservation
        }
    
    
        // if ($order) {
        //     // Assuming $reservation->id contains the desired reservation ID
        //     $order->reservation_id = $reservation->id;
        //     $order->save();
        //     // Other logic for storing the reservation
        // }
        
        // Redirect or perform any other action as needed
        return redirect()->route('customer.menu');
    }

    public function updateReservationTable(Request $request, Reservations $reservations)
{
    // Validate your request data as needed

    $status = $request->input('status');
    $tableId = $request->input('table');


    if ($reservations) {
        $reservations->status = $status;
        $reservations->table_id = $tableId;
        $reservations->save();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Table assigned successfully.');
    }

    // Redirect or respond in case of an error
    return redirect()->back()->with('error', 'Reservation not found.');
}

    public function customerHistory()
    {
        return view("customer.customerHistory");
    } 



}
