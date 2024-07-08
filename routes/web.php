<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/insert-data', [OrderController::class, 'insertData']);
Route::get('/orders-by-user', [OrderController::class, 'getOrdersByUserId']);
Route::get('/detailed-orders', [OrderController::class, 'getDetailedOrders']);
Route::get('/orders-in-range', [OrderController::class, 'getOrdersInRange']);
Route::get('/users-by-name', [OrderController::class, 'getUsersByName']);
Route::get('/total-orders-by-user', [OrderController::class, 'getTotalOrdersByUserId']);
Route::get('/orders-with-user-info', [OrderController::class, 'getOrdersWithUserInfo']);
Route::get('/total-sum', [OrderController::class, 'getTotalSum']);
Route::get('/cheapest-order', [OrderController::class, 'getCheapestOrder']);
Route::get('/grouped-orders', [OrderController::class, 'getGroupedOrders']);


Route::get('/', function () {
    return view('welcome');
});
