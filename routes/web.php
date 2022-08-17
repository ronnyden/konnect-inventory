<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionManagerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\TransactionController;
use App\Models\RegionManager;
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
    return view('profile',['categories'=>AdminController::categories()]);
});
Route::get('/generate-barcode', [ProductController::class, 'index'])->name('generate.barcode');
// ........................Auth Routes............................
Route::post('/login',[AuthenticationController::class,'login'])->name('login');
Route::post('/logout',[AuthenticationController::class,'logout']);
// ........................Admin Routes............................
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/add_user',[SuperAdmin::class,'addUser']);
Route::get('/new_region_manager',function(){ return view('admin.add_region_manager',['regions'=>AdminController::regions()]);});
Route::post('add_region_manager',[AdminController::class,'createRegionManager'])->name('add_region_manager');
Route::post('/super_admin/create_user',[SuperAdmin::class,'createAdmin'])->name('create_admin');

//........................Stock Routes.........................
Route::get('/stock/new_stock',[StockController::class,'stockForm']);
Route::post('/stock/add_stock',[StockController::class,'addStock']);
Route::get('/stock/available_stock',[StockController::class,'getAvailableStock']);

//.............................Region Manager Routes...............................
Route::get('/region_manager/dashboard',[RegionManagerController::class,'dashboard']);
Route::get('/regions/managers',[RegionManagerController::class,'viewRegionManagers']);

//............................Delivery Team.........................................
Route::get('/add_delivery_team',[RegionManagerController::class,'add_team']);
Route::post('/new_delivery_team',[AdminController::class,'createDeliveryPerson'])->name('new_deliveryteam');
Route::get('/deliveryteam/all',[DeliveryController::class,'viewTeam']);

//....................Products Routes.....................................
Route::get('/products/all_products',function(){
    return view('products.all_products',[
        'products'=>ProductsController::getProducts()
    ]);
});
Route::get('/products/add_product',function(){
    return view('products.new_product',[
        'products'=>ProductsController::getProducts(),
        'categories'=>AdminController::categories(),
        'units'=>ProductsController::getUnits()
    ]);
});

Route::get('/products/addto_product',function(){
    return view('products.existing_product',[
        'products'=>ProductsController::getProducts(),
        'categories'=>AdminController::categories(),
        'units'=>ProductsController::getUnits()
    ]);
});
Route::get('/products/allocate',function(){
    return view('products.allocate',[
        'products'=>ProductsController::getProducts(),
        'regions'=>AdminController::regions()
    ]);
});
Route::post('/allocate',[ProductsController::class,'allocateProduct'])->name('products/allocate');
Route::post('/new_product',[ProductsController::class,'createProduct'])->name('new_product');
Route::get('/barcode/{code}')->name('barcode');
 
//........................................Transactions.............................................
Route::get('/transactions/allocations',[TransactionController::class,'viewTransactions']);