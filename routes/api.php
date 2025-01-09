<?php

use App\Http\Controllers\ApiControllers\{
    AuthController,
    CategoryController,
    ProductController,
    StoryController,
    ColorController,
    ReviewController,
    TagController,
    ToolController,
    CartController,
    TeamController,
    WishlistController,
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
Route::post('login', [AuthController::class, 'loginUser']);
Route::post('send-email-forgot-password', [AuthController::class, 'sendEmailForgotPassword']);
Route::post('verify-code', [AuthController::class, 'verifyCode']);
Route::post('update-password', [AuthController::class, 'updatePassword']);
Route::post('resend-code', [AuthController::class, 'resendCode']);

// Categories APIs
Route::get('categories', [CategoryController::class, 'getAllCategories']);
Route::get('room-categories', [CategoryController::class, 'getAllRoomCategories']);

// Product APIs
Route::get('popular-products', [ProductController::class, 'popularProducts']);
Route::get('products-by-color/{id}', [ProductController::class, 'getProductsByColor']);
Route::get('products-by-tag/{id}', [ProductController::class, 'getProductsByTag']);
Route::get('get-product-by-id/{id}', [ProductController::class, 'getProductById']);

// Review
Route::get('get-review-by-product/{id}', [ReviewController::class, "getReviewByProduct"]);

// Color Api
Route::get('colors', [ColorController::class, 'getAllColors']);

// Tags
Route::get('tags', [TagController::class, 'getTags']);

// Stories APIs
Route::get('stories', [StoryController::class, 'getStories']);

// Tools APIs
Route::get('tools', [ToolController::class, 'getTools']);

// Team APi 
Route::get('get-team-member', [TeamController::class, "getTeam"]);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class, 'logoutUser']);
    
    // Review
    Route::post('store-review', [ReviewController::class, 'storeReview']);

    // Cart
    Route::get('show-cart-items', [CartController::class, "showCartItems"]);
    Route::post('store-cart', [CartController::class, 'storeCart']);
    Route::get('delete-cart-item/{id}', [CartController::class, 'deleteCartItem']);

    // Wishlist
    Route::get('show-wishlist-items', [WishlistController::class, "showWishlistItems"]);
    Route::post('store-wishlist', [WishlistController::class, 'storeWishlist']);
    Route::get('delete-wishlist-item/{id}', [WishlistController::class, 'deleteWishlistItem']);
});