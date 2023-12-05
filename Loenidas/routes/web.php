<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PosController;

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
  Route::get('/inventory/inventoryRestockingHistoryList{id}', 'inventoryRestockingHistoryList')->name('inventory.inventoryRestockingHistoryList');

  // Route::post('/inventory/inventoryRestocking', 'inventoryRestockingUpdate');
  Route::post('/inventory/inventoryCategory', 'addInventoryCategory');
  Route::post('/restock_store', 'restock_store')->name('restock_store');
  Route::post('/updateInventory', 'updateInventory');
});


Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::controller(MenuController::class)->group(function () {
  Route::get('/menu/menuCategory', 'menuCategory')->name('menu.menuCategory');
  Route::get('/menu/addMenu', 'addMenuForm')->name('menu.form');
  Route::get('/menu/{id}', 'menuDetails')->name('menu.details');

  Route::post('/menu/addMenu', 'addMenu')->name('menu.store');
  Route::post('/menu/menuCategory', 'addMenuCategory');
});

Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');
Route::controller(ExpensesController::class)->group(function () {
  Route::get('/expenses/{year}/{month}', 'expensesDetails')->name('expenses.details');
  Route::get('/expenses/addExpenses', 'addExpensesForm')->name('expenses.form');
  Route::post('/expenses/addExpenses', 'addExpenses')->name('expenses.store');
});

Route::get('/customerHome', [CustomerController::class, 'index']);
Route::controller(CustomerController::class)->group(function () {
  Route::get('/customerMenu', 'customerMenu');
  Route::get('/customerCart', 'customerCart');
  Route::get('/customerReservation', 'customerReservation');

});



route::resource('/staffs', 'App\Http\Controllers\StaffUserController');

route::resource('/inventory', 'App\Http\Controllers\InventoryController');
// route::resource('/menu', 'App\Http\Controllers\MenuController');
route::resource('/pos', 'App\Http\Controllers\PosController');
route::resource('/branch', 'App\Http\Controllers\BranchController');

Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::post('/pos', [PosController::class, 'store'])->name('pos.store');

// Route::controller(PosController::class)->group(function () {
//   Route::post('/pos', 'store')->name('pos.store');
//   // Route::get('/expenses/{year}/{month}', 'expensesDetails')->name('expenses.details');
//   // Route::get('/expenses/addExpenses', 'addExpensesForm')->name('expenses.form');
  
// });

route::controller(AuthController::class)->group(function () {
  Route::get('/signin', 'signin')->name('signin');
  Route::post('/signin_store', 'signin_store')->name('signin.store');
  Route::get('logout', 'logout')->name('logout');

  Route::get('/customerSignupForm', 'customerSignup')->name('signup.form');
  Route::post('/customerSignup', 'signup_customer')->name('signup.store');
});


Route::get('/customerHome', [CustomerController::class, 'index']);