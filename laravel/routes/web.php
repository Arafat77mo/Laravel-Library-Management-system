<?php
use App\Http\Controllers\BookController;
// use App\Http\Controllers\BookCategoryController;
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

Route::get('/home', [BookController::class, 'index'])->name('home')->middleware('auth');

Route::get('category/{id}', [BookController::class, 'showcat']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
