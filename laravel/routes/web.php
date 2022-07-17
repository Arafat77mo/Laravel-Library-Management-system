<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\searchController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;



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

Route::get('/home', [BookController::class, 'index'])->name('home')->middleware('auth');



Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch')->middleware('auth');




Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch')->middleware('auth');





Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch')->middleware('auth');
Route::get('category/{id}', [BookController::class, 'showcat'])->middleware('auth');
Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch')->middleware('auth');

Route::resource('show','App\Http\Controllers\BookController')->middleware('auth')->middleware('auth');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::resource('comment','App\Http\Controllers\CommentController')->middleware('auth')->middleware('auth');





Route::get('cart', [CartController::class, 'cartList'])->name('cart.list')->middleware('auth');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store')->middleware('auth');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update')->middleware('auth');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove')->middleware('auth');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear')->middleware('auth');


// update profile
Route::get('myprofile',[ProfileController::class,'index'])->name('getprofile')->middleware('auth');
Route::get('getprofile/{id}',[ProfileController::class,'edit'])->name('updateprofile')->middleware('auth');
Route::put('updateprof/{id}',[ProfileController::class,'update'])->name('updatee')->middleware('auth');



Route::get('category/{id}', [BookController::class, 'showcat'])->middleware('auth');
