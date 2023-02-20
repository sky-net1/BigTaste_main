<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('users', [userController::class, 'getAllUsers']);

Route::post('verify-transaction', [TransactionController::class, 'verifyTransaction']);
Route::post('start', [TransactionController::class, 'start']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout', [AuthController::class, 'logout']);
    //categories
    Route::post('category', [CategoryController::class, 'store']);
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category/{category}', [CategoryController::class, 'show']);
    Route::get('category/products/{category_id}', [CategoryController::class, 'getProductsByCategory']);
    // Route::put('category/{id}', [CategoryController::class, 'update']);
    // Route::delete('category/{id}', [CategoryController::class, 'destroy']);
    // Route::get('category/search/{name}', [CategoryController::class, 'search']);

    //product
    Route::post('product', [ProductController::class, 'store']);
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    //  Route::put('product/{id}', [ProductController::class, 'update']);
    //  Route::delete('product/{id}', [ProductController::class, 'destroy']);
    //  Route::get('product/search/{name}', [ProductController::class, 'search']);

    Route::get('top-rated-menu', [ProductController::class, 'topRatedMenu']);
    Route::get('recently-browsed', [ProductController::class, 'recentlyBrowsed']);
    Route::get('hot-sales', [ProductController::class, 'hotSales']);

    //Orders
    Route::post('add-new-order', [OrderController::class, 'addNewOrder']);
    Route::get('orders', [OrderController::class, 'getAllOrders']);
    Route::get('orders/{id}', [OrderController::class, 'getOrder']);

    Route::post('change-password', [AuthController::class, 'changePassword']);

    //user routes
    Route::get('user/{idOrEmail}', [UserController::class, 'getUser']);
    Route::get('favorites', [UserController::class, 'getFavorites']);
    Route::post('favorites', [UserController::class, 'addFavorites']);
    Route::get('notification', [NotificationController::class, 'getNotifications']);
    Route::post('notifications', [NotificationController::class, 'store']);
    Route::post('messages', [MessageController::class, 'store']);
    Route::get('messages', [MessageController::class, 'getAllMessages']);
    Route::get('messages/{id}', [MessageController::class, 'getUserMessage']);
});
