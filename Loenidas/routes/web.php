<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Models\StaffUser;

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

Route::get('/', function () {
    return view("admin.inventoryStatus");
});

route::resource('/staffs','App\Http\Controllers\StaffUserController');
route::resource('/inventory','App\Http\Controllers\InventoryController');
route::resource('/menu','App\Http\Controllers\MenuController');
route::resource('/menuCategory','App\Http\Controllers\MenuCategoryController');
route::resource('/pos','App\Http\Controllers\PosController');
route::resource('/branch','App\Http\Controllers\BranchController');
route::resource('/expenses','App\Http\Controllers\ExpensesController');

route::controller(AuthController::class)->group(function () {
    Route::get('/signin','signin')->name('signin');
    Route::post('/signin_store', 'signin_store')->name('signin.store');
    Route::get('logout','logout')->name('logout');
});
