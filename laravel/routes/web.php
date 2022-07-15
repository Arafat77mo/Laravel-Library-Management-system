<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\searchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [BookController::class, 'index'])->name('home');
Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
