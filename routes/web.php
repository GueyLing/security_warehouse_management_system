<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Models\Stock;
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
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->middleware('role:admin');
Route::get('/admin_add', 'App\Http\Controllers\Admin\DashboardController@addStaff')->middleware('role:admin');
Route::post('/admin_store', 'App\Http\Controllers\Admin\DashboardController@store')->middleware('role:admin');
Route::get('/admin_delete/{id}', 'App\Http\Controllers\Admin\DashboardController@delete')->middleware('role:admin');
Route::get('/admin_edit/{id}', 'App\Http\Controllers\Admin\DashboardController@showData')->middleware('role:admin');
Route::post('/admin_edit', 'App\Http\Controllers\Admin\DashboardController@edit')->middleware('role:admin');
Route::get('/logging', 'App\Http\Controllers\Admin\DashboardController@logging')->middleware('role:admin');


Route::get('/admin_warehousestaff', 'App\Http\Controllers\Admin\DashboardController@indexWarehouse')->middleware('role:admin');
Route::get('/admin_addwarehouse', 'App\Http\Controllers\Admin\DashboardController@addStaffWarehouse')->middleware('role:admin');
Route::post('/admin_storewarehouse', 'App\Http\Controllers\Admin\DashboardController@storeWarehouse')->middleware('role:admin');
Route::get('/admin_deletewarehouse/{id}', 'App\Http\Controllers\Admin\DashboardController@deleteWarehouse')->middleware('role:admin');
Route::get('/admin_editwarehouse/{id}', 'App\Http\Controllers\Admin\DashboardController@showDataWarehouse')->middleware('role:admin');
Route::post('/admin_editwarehouse', 'App\Http\Controllers\Admin\DashboardController@editWarehouse')->middleware('role:admin');



Route::get('/purchasingstaff_dashboard', 'App\Http\Controllers\PurchasingStaff\DashboardController@index')->middleware('role:purchasing_staff');
Route::get('/purchasingstaff_stockhistory', 'App\Http\Controllers\PurchasingStaff\DashboardController@stockHistory')->middleware('role:purchasing_staff');
Route::get('/purchasingstaff_lowstockalert', 'App\Http\Controllers\PurchasingStaff\DashboardController@lowStockAlert')->middleware('role:purchasing_staff');
Route::get('/purchasingstaff_search', 'App\Http\Controllers\PurchasingStaff\DashboardController@search')->middleware('role:purchasing_staff');

Route::get('/warehousestaff_dashboard', 'App\Http\Controllers\WarehouseStaff\DashboardController@index')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_stocktake', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockTake')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addnewstocktake', 'App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockTake')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_selectlocation', 'App\Http\Controllers\WarehouseStaff\DashboardController@selectLocation')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_store', 'App\Http\Controllers\WarehouseStaff\DashboardController@store')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_show/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@showData')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_lowstockalert', 'App\Http\Controllers\WarehouseStaff\DashboardController@lowStockAlert')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_stockreport', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockReport')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_stockreceived', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockReceived')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addnewstockreceived', 'App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockReceived')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_stockadjustment', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockAdjustment')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addstockadjustment', 'App\Http\Controllers\WarehouseStaff\DashboardController@addStockAdjustment')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_stockissue', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addstockissue', 'App\Http\Controllers\WarehouseStaff\DashboardController@addStockIssue')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_retrieve/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@retrieve')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_storestockadjustment', 'App\Http\Controllers\WarehouseStaff\DashboardController@storeStockAdjustment')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_showstockadjustment/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@showDataStockAdjustment')->middleware('role:warehouse_staff');

Route::get('/warehousestaff_showstockreceive/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@showStockReceive')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_addnewstockreceived', 'App\Http\Controllers\WarehouseStaff\DashboardController@addStockReceive')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_retrievestockreceived/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@retrieveStockReceive')->middleware('role:warehouse_staff');


Route::get('/warehousestaff_stockissue', 'App\Http\Controllers\WarehouseStaff\DashboardController@stockIssue')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addnewstockissue', 'App\Http\Controllers\WarehouseStaff\DashboardController@addNewStockIssue')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_showstockissue/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@showStockIssue')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_addnewstockissue', 'App\Http\Controllers\WarehouseStaff\DashboardController@addStockIssue')->middleware('role:warehouse_staff');

Route::get('/warehousestaff_product', 'App\Http\Controllers\WarehouseStaff\DashboardController@productMaintenance')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_addnewproduct', 'App\Http\Controllers\WarehouseStaff\DashboardController@addNewProduct')->middleware('role:warehouse_staff');
Route::post('/warehousestaff_storeproduct', 'App\Http\Controllers\WarehouseStaff\DashboardController@storeProduct')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_edit/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@showProductData')->middleware('role:warehouse_staff');
Route::get('/warehousestaff_delete/{id}', 'App\Http\Controllers\WarehouseStaff\DashboardController@deleteProduct')->middleware('role:warehouse_staff');
Route::post('/warehouse_edit', 'App\Http\Controllers\WarehouseStaff\DashboardController@edit')->middleware('role:warehouse_staff');
