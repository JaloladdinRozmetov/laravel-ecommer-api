<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::group(['prefix' => 'products','as' => 'product.','middleware' => ["auth:sanctum"]], function () {
    Route::get('/', [ProductApiController::class, 'index'])->name('index');
    Route::post('/', [ProductApiController::class, 'store'])->name('store');
    Route::get('/{id}', [ProductApiController::class, 'show'])->name('show');
    Route::put('/{id}', [ProductApiController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductApiController::class, 'destroy'])->name('destroy');
});
Route::post('/search',[ProductApiController::class,'search'])->name('product.search')->middleware('auth:sanctum');
Route::group(['prefix' => 'category','as' => 'category.','middleware' => ["auth:sanctum"]], function () {
    Route::get('/', [CategoryApiController::class, 'index'])->name('index');
    Route::post('/', [CategoryApiController::class, 'store'])->name('store');
    Route::get('/{id}', [CategoryApiController::class, 'show'])->name('show');
    Route::put('/{id}', [CategoryApiController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryApiController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'cart','as' => 'cart.','middleware' => ["auth:sanctum"]],function (){
    Route::post('/add', [CartApiController::class, 'addToCart'])->name('add');
    Route::post('/remove', [CartApiController::class, 'removeFromCart'])->name('remove');
    Route::get('/items', [CartApiController::class, 'getCartItems'])->name('items');
});

