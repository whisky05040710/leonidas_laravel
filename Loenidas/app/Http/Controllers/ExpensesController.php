<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Http\Requests\StoreExpensesRequest;
use App\Http\Requests\UpdateExpensesRequest;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return $this->expenses();
    }

    private function expenses()
    {
        $monthlyExpenses = Expenses::selectRaw('CONCAT(month, " ", year) AS monthYear, SUM(amount) AS totalAmount')
        ->groupBy('monthYear')
        ->pluck('totalAmount', 'monthYear');

        $expenses = Expenses::all(); 
        return view('admin.expenses', compact('expenses', 'monthlyExpenses'));
    }

    public function expensesDetails($year, $month)
    {
        // Construct the date format expected by the database (e.g., February 2023)
        $yearMonth = ucfirst($month) . ' ' . $year;
    
        // Fetch expenses for the specified year and month
        $expensesDetails = Expenses::where('year', $year)
            ->where('month', ucfirst($month)) // Adjust the month format if needed
            ->get();
    
        return view('admin.expensesDetails', compact('expensesDetails'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.expensesAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpensesRequest $request)
    {
        $validatedData = $request->validated();

        $imagePath = $request->file('image')->store('expenses_images', 'public');
        $Expenses = new Expenses();
        $Expenses->fill([
            'expensesName' => $validatedData['expensesName'],
            'month' => $validatedData['month'],
            'year' => $validatedData['year'],
            'amount' => $validatedData['amount'],
            'image' => $imagePath,

        ]);

        $Expenses->save();
        alert()->success('success','New Expenses has been added');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Expenses $expenses)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpensesRequest $request, Expenses $expenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenses $expenses)
    {
        //
    }
}
