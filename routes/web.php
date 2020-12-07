<?php


use App\Http\Controllers\MainController;
use App\Http\Controllers\MainResourceController;
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

Route::resource('/order' , MainResourceController::class);
Route::get('/', [MainController::class, "mainPage"]);
Route::get('/order-restore', [MainController::class, "orderRestore"]);
Route::post('/order-restore', [MainController::class, "orderRestorePost"]);


//Route::post('/order-form', [MainController::class, "success"]);
//Route::get('/order-form', [MainController::class, "orderForm"]);
//Route::get('/orders-list', [MainController::class, "orderList"]);


