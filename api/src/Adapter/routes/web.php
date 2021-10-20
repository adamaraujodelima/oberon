<?php

use App\Http\Controllers\Buyer\CreateController as BuyerCreateController;
use App\Http\Controllers\Buyer\EditController as BuyerEditController;
use App\Http\Controllers\Buyer\PaginationController as BuyerPaginationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/buyer/create', [BuyerCreateController::class, 'main']);
Route::get('/api/buyer/edit/{id}', [BuyerEditController::class, 'main']);
Route::get('/api/buyer/pagination', [BuyerPaginationController::class, 'main']);
