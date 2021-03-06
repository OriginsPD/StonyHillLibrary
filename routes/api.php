<?php

use App\Http\Controllers\API\BookDetailController;
use App\Http\Controllers\API\BorrowedBookController;
use App\Http\Controllers\API\MemberController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/member', MemberController::class);
Route::resource('/BookDetail', BookDetailController::class);
Route::resource('/BorrowedBook', BorrowedBookController::class);


