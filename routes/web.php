<?php

use App\Http\Controllers\ApiControllers\AuthController;
use App\Http\Controllers\WebControllers\Auth\SocialiteController;
use App\Http\Controllers\WebControllers\{
    AttributeController,
    AttributeValueController,
    BlogController,
    CategoryController,
    DashboardController,
    DeliveryDetailController,
    DeliveryPreferenceController,
    FaqController,
    GeneralController,
    OrderController,
    PageController,
    ParentCategoryController,
    ProductController,
    ProfileController,
    ReelsController,
    TeamController,
    UserController,
};
use App\Http\Controllers\Admin\{
    PermissionsController,
    RolesController,
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

    // Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    // Route::resource('permissions', PermissionsController::class);
    Route::controller(PermissionsController::class)
        ->prefix('permissions')
        ->as('permissions.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            // Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('destroy', 'massDestroy')->name('massDestroy');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Roles
    Route::controller(RolesController::class)
        ->prefix('roles')
        ->as('roles.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            // Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('destroy', 'massDestroy')->name('massDestroy');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });


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

    // Attributes
    Route::controller(AttributeController::class)
        ->prefix('attribute')
        ->as('attribute.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Orders
    Route::controller(OrderController::class)
        ->prefix('orders')
        ->as('order.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::post('get-address', 'getAddress')->name('get.address');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Attributes
    Route::controller(AttributeValueController::class)
        ->prefix('attributevalue')
        ->as('attributevalue.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Products
    Route::controller(ProductController::class)
        ->prefix('product')
        ->as('product.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::delete('delete/image', 'deleteImage')->name('delete.image');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
            Route::post('fetch-attributes-values', 'fetchAttributesValues')->name('attributes.values');
            Route::post('get-categories', 'getCategories')->name('get.categories');
        });

    // Delivery Detail
    Route::controller(DeliveryDetailController::class)
        ->prefix('delivery')
        ->as('delivery.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Reels
    Route::controller(ReelsController::class)
        ->prefix('reels')
        ->as('reel.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Team
    Route::controller(TeamController::class)
        ->prefix('team')
        ->as('team.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Blog
    Route::controller(BlogController::class)
        ->prefix('blogs')
        ->as('blog.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // FAQs
    Route::controller(FaqController::class)
        ->prefix('faqs')
        ->as('faq.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Users
    Route::controller(UserController::class)
        ->prefix('users')
        ->as('user.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Profile
    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->as('profile.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });

    // Delivery Preferences
    Route::controller(DeliveryPreferenceController::class)
        ->prefix('preference')
        ->as('preference.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::patch('update', 'update')->name('update');
        });


    Route::controller(GeneralController::class)
        ->prefix('general')
        ->as('general.')
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::patch('update-charges', 'updateCharges')->name('update.charges');
            Route::patch('update-info', 'updateInfo')->name('update.info');
            Route::patch('update-favicons', 'updateFavIcons')->name('update.fav.icons');
        });

    Route::controller(PageController::class)
        ->prefix('page')
        ->as('page.')
        ->group(function () {
            Route::get('home/index', 'homeIndex')->name('home.index');
            Route::get('about/index', 'aboutIndex')->name('about.index');

            Route::patch('update-home', 'updateHome')->name('update.home');
            Route::patch('update-about', 'updateAbout')->name('update.about');
        });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
