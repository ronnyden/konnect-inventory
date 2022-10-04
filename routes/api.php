<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionManagerController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\TransactionController;
use App\Models\DeliveryTeam;
use App\Models\RegionManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('login');
});
Route::get('/test',function(){
    return view('profile',['categories'=>AdminController::categories()]);
});
// ........................Auth Routes............................
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthenticationController::class,'logout']);
// ........................Admin Routes............................
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/add_user',[SuperAdmin::class,'addUser']);
Route::get('/new_region_manager',function(){ return view('admin.add_region_manager',['regions'=>AdminController::regions()]);});
Route::post('/add_region_manager',[AdminController::class,'createRegionManager'])->name('add_region_manager');
Route::post('/super_admin/create_user',[SuperAdmin::class,'createAdmin'])->name('create_admin');

//........................Stock Routes.........................
Route::get('/stock/new_stock',[StockController::class,'stockForm']);
Route::post('/stock/add_stock',[StockController::class,'addStock']);
Route::get('/stock/available_stock',[StockController::class,'getAvailableStock']);
Route::get('/stock/stock_info',[StockController::class,'getStockworthInfo']);
Route::get('stock/total/{region}',[StockController::class,'getTotalStockByRegion']);
//.............................Region Manager Routes...............................
Route::post('/users/new/region_admin',[RegionManagerController::class,'createRegionadmin']);
Route::get('/users/region_admins',[RegionManagerController::class,'getRegionManagers']);
Route::get('/users/region_admins/{id}',[RegionManagerController::class,'getRegionAdminById']);
Route::get('/users/region_admins/{region}',[RegionManagerController::class,'getRegionAdminByRegion']);


//............................Delivery Team.........................................
Route::post('/users/new/delivery_team',[DeliveryController::class,'createDeliveryPerson'])->name('new_deliveryteam');
Route::get('/users/delivery_persons',[DeliveryController::class,'getDeliverypersons']);
Route::get('/users/delivery_persons/{id}',[DeliveryController::class,'getDeliveryPersonById']);
Route::delete('/users/delivery_persons/delete/{id}',[DeliveryController::class,'removeDeliveryPerson']);

//............................Delivery Process.........................................
Route::post('/order/assign',[DeliveryController::class,'assignOrder']);
Route::get('/orders/assigned',[DeliveryController::class,'getAssignedOrders']);
//....................Products Routes.....................................
Route::get('/products/all_products',function(){
    return view('products.all_products',[
        'products'=>ProductsController::getProducts()
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
Route::get('/transactions/purchases',function(){
    return view('transactions.inventory',['inventory'=>TransactionController::getInventoryTransactions()]);
});
Route::get('/history/allocations',[TransactionController::class,'getAllocationTransactions']);
