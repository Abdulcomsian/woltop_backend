<?php

use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\WebControllers\Auth\SocialiteController;
use App\Http\Controllers\WebControllers\{
    CategoryController,
    DashboardController,
    ParentCategoryController,
    ProductController,
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

Route::get('verify-email/{token}/{user}', [AuthController::class, "verifyEmail"])->name('verify.email.user');

Route::middleware(['auth', 'verified', 'is_admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Parent Categories
    Route::controller(ParentCategoryController::class)
        ->prefix('parent_category')
        ->as('parent-category.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Categories
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('store-category', [CategoryController::class, 'storeCategory'])->name('store.category');
    Route::post('delete-category', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('update.category');

    // Products
    Route::controller(ProductController::class)
        ->prefix('product')
        ->as('product.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
