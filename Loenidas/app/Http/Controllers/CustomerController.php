<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;

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

    public function customerCart()
    {
        return view("customer.customerCart");
    } 

    public function customerReservation()
    {
        return view("customer.customerReservation");
    } 
}
