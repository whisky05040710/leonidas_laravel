<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return $this->inventoryStatus();
  }

  private function inventoryStatus()
  {
    $inventories = Inventory::with('inventoryCategory')->get();
    $categories = InventoryCategory::all();
    return view("admin.inventoryStatus", compact("inventories", "categories"));
  }

  public function inventoryCategory()
  {

    $categories = InventoryCategory::select([
      'inventory_category.*',
      DB::raw('(SELECT COUNT(*) FROM inventories WHERE inventories.inventory_category_id = inventory_category.id) AS reference_count')
    ])
      ->with('inventories')
      ->get();
    return view('admin.inventoryCategory', compact('categories'));
  }

  public function addInventoryCategory(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|unique:inventory_category'
    ]);
    InventoryCategory::create([
      'name' => $validated['name']
    ]);
    return redirect('/inventory/inventoryCategory');
  }

  public function inventoryRestocking()
  {
    return view('admin.inventoryRestocking');
  }

  public function inventoryRestockingHistory()
  {
    return view('admin.inventoryRestockingHistory');
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
  public function store(StoreInventoryRequest $request)
  {
    $validatedData = $request->validated();
    Inventory::create($validatedData);

    return back();
  }

  /**
   * Display the specified resource.
   */
  public function show(Inventory $inventory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Inventory $inventory)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateInventoryRequest $request, Inventory $inventory)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Inventory $inventory)
  {
    //
  }
}
