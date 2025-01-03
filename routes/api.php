<?php

use App\Http\Controllers\ApiControllers\{
    AuthController,
    CategoryController,
    ProductController,
    StoryController,
    ColorController,
    TagController,
    ToolController,
};
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Authentication Apis
Route::post('register', [AuthController::class, "registerUser"]);

// Categories APIs
Route::get('categories', [CategoryController::class, 'getAllCategories']);
Route::get('room-categories', [CategoryController::class, 'getAllRoomCategories']);

// Product APIs
Route::get('popular-products', [ProductController::class, 'popularProducts']);
Route::get('products-by-color/{id}', [ProductController::class, 'getProductsByColor']);
Route::get('products-by-tag/{id}', [ProductController::class, 'getProductsByTag']);
Route::get('get-product-by-id/{id}', [ProductController::class, 'getProductById']);

// Color Api
Route::get('colors', [ColorController::class, 'getAllColors']);

// Tags
Route::get('tags', [TagController::class, 'getTags']);

// Stories APIs
Route::get('stories', [StoryController::class, 'getStories']);

// Tools APIs
Route::get('tools', [ToolController::class, 'getTools']);