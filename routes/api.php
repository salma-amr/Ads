<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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

Route::Resource('category', Controllers\CategoryController::class);
Route::Resource('tag', Controllers\TagController::class);
Route::Resource('ads', Controllers\AdvertismentController::class);

// Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
//     Route::post('create',[Controllers\AuthController::class, 'register']);
//     Route::get('logout',[Controllers\AuthController::class, 'logout']);
//     Route::Resource('client', Controllers\ClientsController::class);
//     Route::Resource('invoice', Controllers\InvoiceController::class);
// });
