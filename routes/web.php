<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskControlletr;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
Route::get('/', function () {
    $products = DB::table('products')->inRandomOrder()->limit(9)->get();;
    return view('home', compact('products'));
})->name('home');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerCreate'])->name('registerCreate');

Route::get('/profile/{user}', [UserController::class, 'show'])->middleware('auth')->name('profile');

Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');

Route::get('task', [TaskControlletr::class, 'index'])->name('create_tasks');
Route::get('show_task{task}', [TaskControlletr::class, 'show'])->name('show_task');
Route::get('edit_task/{task}', [TaskControlletr::class, 'edit'])->name('edit_task');
Route::patch('store_task/{task}', [TaskControlletr::class, 'update'])->name('update_task');
Route::delete('destroy_task/{task}', [TaskControlletr::class, 'destroy'])->name('destroy_task');
Route::post('task', [TaskControlletr::class, 'store'])->name('task.store');

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('category_create', [AdminController::class, 'create'])->name('create_category');
Route::post('category_store', [AdminController::class, 'store'])->name('store_category');
Route::get('category_show', [AdminController::class, 'show'])->name('show_category');
Route::get('admin/{task}', [AdminController::class, 'show'])->name('admin_show');
Route::get('category_edit/{category}', [AdminController::class, 'edit'])->name('edit_category');
Route::delete('category_destroy/{category}', [AdminController::class, 'destroy'])->name('destroy_category');
Route::get('orders_index', [AdminController::class, 'indexOrder'])->name('index_orders');
Route::patch('order_update/{order}', [AdminController::class, 'updateOrder'])->name('update_order');
Route::delete('destroy_message/{message}', [AdminController::class, 'destroyMessage'])->name('destroy_message');
Route::patch('category_create/{category}', [AdminController::class, 'update'])->name('update_category');
Route::get('edit_product/{product}', [AdminController::class, 'editProduct'])->name('edit_product');
Route::patch('create_product/{product}', [AdminController::class, 'updateProduct'])->name('update_product');
Route::delete('destroy_product/{product}', [AdminController::class, 'destroyProduct'])->name('destroy_product');

Route::get('status_ok/{task}', [StatusController::class, 'status_ok'])->name('status_ok');
Route::get('status_otkaz/{task}', [StatusController::class, 'status_otk'])->name('status_otk');
Route::patch('status_update/{task}', [StatusController::class, 'status_upd_ok'])->name('status_upd_ok');
Route::patch('status_update_otk/{task}', [StatusController::class, 'status_upd_otk'])->name('status_upd_otk');
Route::get('filter', [FilterController::class, 'filter'])->name('filter');


Route::group([
    'as' => 'blog.',
    'prefix' => 'blog',
    ], function () {
    Route::get('category/{category:slug}', 'BlogController@category')
        ->name('category');
});

Route::get('show_all_message', [MessageController::class, 'index'])->name('show_all_message');
Route::get('create_message', [MessageController::class, 'create'])->name('create_message');
Route::post('store_message', [MessageController::class, 'store'])->name('store_message');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth'); // Добавляем маршрут и middleware 'auth'

Route::group([
    'as' => 'categories.',
    'prefix' => 'categories',
], function() {
    Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('show');
});

Route::get('create_feedback/{product}', [FeedbackController::class, 'create'])->name('create_feedback');
Route::post('store_feedback/{product}', [FeedbackController::class, 'store'])->name('store_feedback');
Route::get('show_feedback/product', [FeedbackController::class, 'show'])->name('show_feedback');
