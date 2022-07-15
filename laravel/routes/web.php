<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\searchController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

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
})->middleware('auth');

Auth::routes();

Route::get('/home', [BookController::class, 'index'])->name('home');
Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


////// cart
Route::get('/', [BookController::class, 'index'])->name('books.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// update profile 
Route::get('myprofile',[ProfileController::class,'index'])->name('getprofile');
Route::get('getprofile/{id}',[ProfileController::class,'edit'])->name('updateprofile');
Route::put('updateprof/{id}',[ProfileController::class,'update'])->name('updatee');
