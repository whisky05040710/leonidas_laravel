<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function salesDaily(){
        return view("admin.salesDaily");
    }
    
    public function salesDailyDetails(){
        return view("admin.salesDailyDetails");
    }

    public function salesMonthly(){
        return view("admin.salesMonthly");
    }

    public function salesMonthlyDetails(){
        return view("admin.salesMonthlyDetails");
    }
}
