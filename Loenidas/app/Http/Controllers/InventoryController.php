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
    $menus = [
      'menuactive' => 'inventory',
      'submenuactive' => 1
    ];
    return view("admin.inventoryStatus", compact("inventories", "menus"));
  }

  public function inventoryCategory()
  {
    $menus = [
      'menuactive' => 'inventory',
      'submenuactive' => 2
    ];
    return view('admin.inventoryCategory', compact("menus"));
  }

  public function inventoryRestocking()
  {
    $menus = [
      'menuactive' => 'inventory',
      'submenuactive' => 3
    ];
    return view('admin.inventoryRestocking', compact("menus"));
  }

  public function inventoryRestockingHistory()
  {
    $menus = [
      'menuactive' => 'inventory',
      'submenuactive' => 4
    ];
    return view('admin.inventoryRestockingHistory', compact("menus"));
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
