<?php

use App\Http\Controllers\BookApiController;
use App\Http\Controllers\CallbackController;
use App\Http\Livewire\Dashboard\Admin\AdmBook;
use App\Http\Livewire\Dashboard\Admin\AdmDashboard;
use App\Http\Livewire\Dashboard\Admin\AdmIssue;
use App\Http\Livewire\Home\LandingPage;
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

Route::get('/', LandingPage::class)->name('index');

Route::get('/Admin/Dashboard', AdmDashboard::class)->name('admin.dashboard');
Route::get('/Admin/Books', AdmBook::class)->name('admin.books');
Route::get('/Admin/Issues', AdmIssue::class)->name('admin.issue');
Route::get('/Admin/clients',\App\Http\Livewire\Dashboard\Admin\CreateClients::class)->name('admin.clients');

Route::get('/redirect', [CallbackController::class,'index'])->name('redirect');


Route::resource('/post', BookApiController::class);
