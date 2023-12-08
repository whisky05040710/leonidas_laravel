<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function salesDaily(){
        return view("admin.salesDaily");
    }

    public function salesMonthly(){
        return view("admin.salesMonthly");
    }
}
