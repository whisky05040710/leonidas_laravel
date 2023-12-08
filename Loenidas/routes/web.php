<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SalesController;
use App\Models\Tables;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view("customer.menuOrders");
// });


Route::get('/inventory', [InventoryController::class, 'index']);
Route::controller(InventoryController::class)->group(function () {
  Route::get('/inventory/inventoryCategory', 'inventoryCategory')->name('inventory.inventoryCategory');
  Route::get('/inventory/inventoryRestocking', 'inventoryRestocking')->name('inventory.inventoryRestocking');
  Route::get('/inventory/inventoryRestockingHistory', 'inventoryRestockingHistory')->name('inventory.inventoryRestockingHistory');
  Route::get('/inventory/inventoryRestockingHistoryList', 'inventoryRestockingHistoryList')->name('inventory.inventoryRestockingHistoryList');

  // Route::post('/inventory/inventoryRestocking', 'inventoryRestockingUpdate');
  Route::post('/inventory/inventoryCategory', 'addInventoryCategory');
  Route::post('/restock_store', 'restock_store')->name('restock_store');
  Route::post('/updateInventory', 'updateInventory');
});
route::resource('/inventory', 'App\Http\Controllers\InventoryController');


Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::controller(MenuController::class)->group(function () {
  Route::get('/menu/menuCategory', 'menuCategory')->name('menu.menuCategory');
  Route::get('/menu/addMenu', 'addMenuForm')->name('menu.form');
  Route::get('/menu/menuDetails', 'menuDetails')->name('menu.details');

  Route::post('/menu/addMenu', 'addMenu')->name('menu.store');
  Route::post('/menu/menuCategory', 'addMenuCategory');
});

Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
Route::controller(ExpensesController::class)->group(function () {
  Route::get('/expenses/expensesDetails', 'expensesDetails')->name('expenses.details');
  Route::get('/expenses/addExpenses', 'addExpensesForm')->name('expenses.form');
  Route::post('/expenses/addExpenses', 'addExpenses')->name('expenses.store');
  Route::post('/expenses/expensesDetails', 'editExpenses')->name('expenses.edit');

});

Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::post('/pos', [PosController::class, 'store'])->name('pos.store');

route::controller(AuthController::class)->group(function () {
  Route::get('/signin', 'signin')->name('signin');
  Route::post('/signin_store', 'signin_store')->name('signin.store');
  Route::get('logout', 'logout')->name('logout');

  Route::get('/customerSignupForm', 'customerSignup')->name('signup.form');
  Route::post('/customerSignup', 'signup_customer')->name('signup.store');

  Route::get('/customerProfile', 'customerProfile');
  Route::post('/customerProfile', 'customerProfile');
});


// Route::get('/customerHome', [CustomerController::class, 'index']);
// route::controller(CustomerController::class)->group(function () {
//   Route::get('/customerMenu', 'customerMenu');
//   Route::post('/customerMenu', 'storeOrder');
//   Route::get('/customerCart', 'customerCart')->name('customerCart');
//   Route::get('/customerReservation', 'customerReservation')->name('customerReservation');
//   Route::get('/customerHistory', 'customerHistory')->name('customerHistory');
// });


Route::middleware('auth')->group(function () {
  Route::get('/customerMenu', [CustomerController::class, 'customerMenu'])->name('customer.menu');
  Route::get('/customerCart', [CustomerController::class, 'customerCart'])->name('customer.cart');
  Route::get('/customerReservation', [CustomerController::class, 'customerReservation'])->name('customer.reservation');
Route::get('/customerHome', [CustomerController::class, 'index']);

Route::post('/add-to-cart', [CustomerController::class, 'addToCart'])->name('addToCart');
Route::post('/update-quantity', [CustomerController::class, 'updateQuantity'])->name('saveOrder');
});

route::resource('/staffs', 'App\Http\Controllers\StaffUserController');


route::resource('/branch', 'App\Http\Controllers\BranchController');

Route::get('/tables', [TablesController::class, 'index'])->name('tables.index');
Route::post('/tables', [TablesController::class, 'store'])->name('tables.store');

Route::get('/ordersChef', [OrdersController::class, 'ordersChef']);
Route::get('/ordersWaiter', [OrdersController::class, 'ordersWaiter']);

Route::get('/reservation', [ReservationsController::class, 'index']);

Route::get('/salesDaily', [SalesController::class, 'salesDaily'])->name('sales.salesDaily');
Route::get('/salesMonthly', [SalesController::class, 'salesMonthly'])->name('sales.salesMonthly');

