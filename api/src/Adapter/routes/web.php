<?php

use App\Http\Controllers\Buyer\CreateController;
use App\Http\Controllers\Buyer\PaginationController;
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

Route::get('/api/buyer/create', [CreateController::class, 'execute']);
Route::get('/api/buyer/pagination', [PaginationController::class, 'execute']);
