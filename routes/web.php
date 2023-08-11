<?php

use App\Http\Controllers\brandController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\color_sizeController;
use App\Http\Controllers\customerlistController;
use App\Http\Controllers\customerloginController;
use App\Http\Controllers\customerregController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\subCategoryController;
use App\Http\Controllers\wishController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend
Route::get('/', [frontendController::class, 'index'])->name('index');
Route::get('/about', [frontendController::class, 'about'])->name('about');
Route::get('/category-list', [frontendController::class, 'category'])->name('category-list');
Route::get('/contact', [frontendController::class, 'contact'])->name('contact');
Route::get('/customer/profile', [frontendController::class, 'customer_profile'])->name('customer.profile');
Route::get('/customer/order', [frontendController::class, 'customer_order'])->name('customer.order');
Route::get('/wishlist', [frontendController::class, 'wishlist'])->name('wishlist');
Route::get('/singel/product/{slug}', [frontendController::class, 'singel_product'])->name('singel.product');
Route::get('/reg/login', [frontendController::class, 'reg_login'])->name('reg.login');
Route::post('/profile/store', [frontendController::class, 'profile_store'])->name('profile.store');


// card
Route::post('/add/card', [cardController::class, 'add_card'])->name('add.card');
Route::get('/card', [cardController::class, 'card'])->name('card');
Route::post('/card/update', [cardController::class, 'card_update'])->name('cart.update');
Route::get('/card/remove{card_id}', [cardController::class, 'card_remove'])->name('card.remove');

// wish
Route::post('/add/wish', [wishController::class, 'add_wish'])->name('add.wish');
Route::get('/wish/remove{id}', [wishController::class, 'wish_remove'])->name('wish.remove');

// checkout
Route::get('/checkout', [checkoutController::class, 'checkout'])->name('checkout');
Route::post('/orders_stores', [checkoutController::class, 'orders_stores'])->name('orders_stores');
Route::get('/order-success', [checkoutController::class, 'order_success'])->name('order-success');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'category' => categoryController::class,
        'subcategory' => subCategoryController::class,
        'product' => productController::class,
        'brand' => brandController::class,
        'color_size' => color_sizeController::class,
        'inventory' => inventoryController::class,
        'customerlist' => customerlistController::class,
        'order' => orderController::class,
        'profile' => profileController::class,
        'setting' => settingController::class,
    ]);
});

// profile
Route::post('/profile/password/{id}', [profileController::class, 'profile_password'])->name('profile.password');


// order
Route::post('/order/status/{id}', [orderController::class, 'order_status'])->name('order.status');
Route::get('/orderproduct/{order_id}', [orderController::class, 'orderproduct'])->name('orderproduct');
// Route::get('/orderproduct/destroy/{id}', [orderController::class, 'orderproduct_destroy'])->name('orderproduct.destroy');



// category subcategory ajax
Route::post('/getsubcategory', [productController::class, 'getsubcategory']);

// color to size ajax
Route::post('/getsize', [frontendController::class, 'getsize']);

// inventory
Route::get('/product/inventory/{id}', [inventoryController::class, 'product_inventory'])->name('product.inventory');

// customer login
Route::post('/customer/regstore', [customerregController::class, 'customer_regstore'])->name('customer.regstore');
Route::post('/customer/login', [customerloginController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [customerloginController::class, 'customer_logout'])->name('customer.logout');

// shop search
Route::get('/shop', [shopController::class, 'shop'])->name('shop');
