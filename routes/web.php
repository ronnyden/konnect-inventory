<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/test',function(){
    return view('profile');
});
// ........................Auth Routes............................
Route::post('/login',[AuthenticationController::class,'login'])->name('login');
Route::post('/logout',[AuthenticationController::class,'logout']);
// ........................Admin Routes............................
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/add_user',[SuperAdmin::class,'addUser']);
Route::post('/super_admin/create_user',[SuperAdmin::class,'createAdmin'])->name('create_admin');

//........................Stock Routes.........................
Route::get('/stock/new_stock',[StockController::class,'stockForm']);
Route::post('/stock/addstock',[StockController::class,'addStock']);

