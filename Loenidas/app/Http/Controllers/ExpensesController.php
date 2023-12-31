<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Http\Requests\StoreExpensesRequest;
use App\Http\Requests\UpdateExpensesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function addExpensesForm()
{
    return view('admin.expensesAdd');
}

    public function addExpenses(Request $request)
    {
      $validated = $request->validate([
        'expensesName' => 'required|unique:expenses',
        'month' => 'required|string',
        'year' => 'required|integer',
        'amount' => 'required|integer',
        'image' => 'required|image'
        
      ]);

      $imagePath = $request->file('image')->store('expenses_images', 'public');
      Expenses::create([
        'expensesName' => $validated['expensesName'],
        'month' => $validated['month'],
        'year' => $validated['year'],
        'amount' => $validated['amount'],
        'image' => $imagePath
      ]);
      return redirect('/expenses');
    }

    public function expensesDetails(Request $request)
    {
        $year = $request->input('year');
        $month = ucfirst($request->input('month'));

    $yearMonth = $month . ' ' . $year;

    $expensesDetails = Expenses::where('year', $year)
        ->where('month', $month)
        ->get();

    return view('admin.expensesDetails', compact('expensesDetails', 'year', 'month'));
    }
    
    public function editExpenses(Request $request)
    {

    $expensesId = $request->input('expenses_id'); 
    $expensesName = $request->input('expensesName');
    $amount = $request->input('amount');


    $expense = Expenses::find($expensesId);

    if ($expense) {
        $expense->expensesName = $expensesName;
        $expense->amount = $amount;
        
        $expense->save();

        
        return redirect()->back()->with('success', 'Expense updated successfully');
    } else {
        return redirect()->back()->with('error', 'Expense not found');
    }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpensesRequest $request)
    {

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
