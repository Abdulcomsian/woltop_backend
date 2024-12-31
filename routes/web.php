<?php

use App\Http\Controllers\WebControllers\Auth\SocialiteController;
use App\Http\Controllers\WebControllers\{ 
    CategoryController,
    DashboardController,
};
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

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Categories
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('store-category', [CategoryController::class, 'storeCategory'])->name('store.category');
    Route::post('delete-category', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
