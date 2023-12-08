<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Restock;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\StoreRestockRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    $inventories = Inventory::with('inventoryCategory')
                    ->where('status', 'Inventory')
                    ->get();

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
        $restocks = Restock::where('status', 'Cart')
                    ->get();

    return view("admin.inventoryRestocking", compact("restocks"));
  }

  public function updateInventory(Request $request)
  {
    $dataToSend = $request->input('dataToSend');

    foreach ($dataToSend as $data) {
        $stockName = $data['stockName'];
        $quantity = $data['quantity'];

        $inventory = Inventory::where('stockName', $stockName)->first();
        $restock = Restock::where('stockName', $stockName)->first();

        if ($inventory && $restock) {
            // Update Inventory table quantity
            $inventory->quantity += $quantity;
            $inventory->save();

            // Update Restock table status
            Restock::where('stockName', $stockName)->update(['status' => 'Inventory']);
        }
    }

    return response()->json(['success' => true, 'message' => 'Inventory updated successfully']);
  }

  public function inventoryRestockingHistory()
  {
    $histories = Restock::select(DB::raw('DATE(updated_at) as restock_date'), 
        DB::raw('COUNT(*) as total_restocks'),
        DB::raw('SUM(unitCost) as total_restock_cost'))
        ->where('status', 'Inventory')
        ->groupBy('restock_date')
        ->orderBy('restock_date', 'desc')
        ->get();

    return view('admin.inventoryRestockingHistory', compact('histories'));
  }

  public function inventoryRestockingHistoryList(Request $request)
  {
    $date = $request->input('date');
    $formattedDate = Carbon::parse($date)->format('F d, Y');

    $histories = Restock::whereDate('updated_at', $date)
        ->where('status', 'Inventory')
        ->get();

    return view('admin.inventoryRestockingHistoryList', compact('histories','formattedDate'));
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

  public function restock_store(StoreRestockRequest $request)
  {
    $validatedData = $request->validated();
    Restock::create($validatedData);

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
