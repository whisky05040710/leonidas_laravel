<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MenuController;

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
//     return view("admin.inventoryStatus");
// });

Route::get('/', [InventoryController::class, 'index']);
Route::controller(InventoryController::class)->group(function () {
  Route::get('/inventory/inventoryCategory', 'inventoryCategory')->name('inventory.inventoryCategory');
  Route::get('/inventory/inventoryRestocking', 'inventoryRestocking')->name('inventory.inventoryRestocking');
  Route::get('/inventory/inventoryRestockingHistory', 'inventoryRestockingHistory')->name('inventory.inventoryRestockingHistory');
});


Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');;
Route::controller(MenuController::class)->group(function () {
  Route::get('/menu/menuCategory', 'menuCategory')->name('menu.menuCategory');
//   Route::get('/inventory/inventoryRestocking', 'inventoryRestocking')->name('inventory.inventoryRestocking');
//   Route::get('/inventory/inventoryRestockingHistory', 'inventoryRestockingHistory')->name('inventory.inventoryRestockingHistory');
});
// Declare other routes before the resource routes.

route::resource('/staffs', 'App\Http\Controllers\StaffUserController');
route::resource('/inventory', 'App\Http\Controllers\InventoryController');
// route::resource('/menu', 'App\Http\Controllers\MenuController');
// route::resource('/menuCategory', 'App\Http\Controllers\MenuCategoryController');
route::resource('/pos', 'App\Http\Controllers\PosController');
route::resource('/branch', 'App\Http\Controllers\BranchController');
route::resource('/expenses', 'App\Http\Controllers\ExpensesController');


route::controller(AuthController::class)->group(function () {
  Route::get('/signin', 'signin')->name('signin');
  Route::post('/signin_store', 'signin_store')->name('signin.store');
  Route::get('logout', 'logout')->name('logout');
});
