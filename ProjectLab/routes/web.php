<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/',[HomeController::class , 'index']);
Route::get('/index',[HomeController::class , 'showAllPage']);
Route::get('/profile',[HomeController::class , 'showProfilePage'])->name('profile');

Route::get('/add',[HomeController::class , 'showAddPage']);
Route::post('/add',[ProductController::class , 'addProduct']);
Route::get('/detail/{id}',[HomeController::class , 'showDetailPage'])->name('detail');

Route::get('/delete/{id}',[ProductController::class , 'deleteProduct']);
Route::get('/update/{id}',[HomeController::class , 'showUpdatePage']);
Route::post('/update/{id}',[ProductController::class , 'updateProduct']);


Route::get('/register',function() {
    return view('register');
})->name('register');
Route::post('/register',[AuthenticationController::class , 'register']);

Route::get('/login',function() {
    return view('login');
})->name('login');
Route::post('/login',[AuthenticationController::class , 'login']);

Route::post('/logout',function() {
    auth()->logout();
    Session()->flush();

     return redirect('/');
})->name('logout');

Route::get('/admin',[HomeController::class , 'showAdminPage']);

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [ProductCoontroller::class, 'removeCart'])->name('remove.from.cart');

Route::get('/history',[ProductController::class,'historyTransaction']);