<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;

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
    $inventories = Inventory::all();
    return view("admin.inventoryStatus", compact("inventories"));
  }

  public function inventoryCategory()
  {
    return view('admin.inventoryCategory');
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
