<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

// untuk logout
Route::get('logout', function () {
    Auth::logout();
    return Redirect::to('/login');
});

Route::get('/', 'DashboardController@index')->name('dashboard');

// harus di atas resources
Route::get('products/{id}/gallery', 'ProductController@gallery')
    ->name('products.gallery');
Route::resource('products', 'ProductController');
Route::resource('product-galleries', 'ProductGalleryController');

// harus di atas resources
Route::get('transactions/{id}/set-status', 'TransactionController@setStatus')
    ->name('transactions.status');

Route::resource('transactions', 'TransactionController');
