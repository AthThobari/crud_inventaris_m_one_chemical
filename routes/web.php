<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\datatablecontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [logincontroller::class, 'login'])->name('login');
Route::post('/login-proses', [logincontroller::class, 'loginProses'])->name('login-proses');
Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');

Route::get('/register', [logincontroller::class, 'register'])->name('register');
Route::post('/register-proses', [logincontroller::class, 'registerProses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
    //Category CRUD
    Route::get('/dashboard', [CategoriesController::class, 'dashboard'])->name('dashboard');
    //Category Create 
    Route::get('/create-categorie', [CategoriesController::class, 'create'])->name('categorie.create');
    Route::post('/store-categorie', [CategoriesController::class, 'store'])->name('categorie.store');
    //category Edit
    Route::get('/edit-categorie{category_id}', [CategoriesController::class, 'edit'])->name('categorie.edit');
    Route::put('/update-categorie{category_id}', [CategoriesController::class, 'update'])->name('categorie.update');
    //category Delete
    Route::delete('/delete-categorie{category_id}', [CategoriesController::class, 'delete'])->name('categorie.delete');
    
    //item CRUD
    Route::get('/index-item{category_id}', [ItemController::class, 'index'])->name('index.item');
    //item Create 
    Route::get('/create-item{category_id}', [ItemController::class, 'create'])->name('item.create');
    Route::post('/store-item', [ItemController::class, 'store'])->name('item.store');
    //item Edit
    Route::get('/edit-item{item_id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/update-item{item_id}', [ItemController::class, 'update'])->name('item.update');
    //item Delete
    Route::delete('/delete-item{item_id}', [ItemController::class, 'delete'])->name('item.delete');

    
    
    Route::get('/create', [homecontroller::class, 'create'])->name('user.create');
    Route::post('/store', [homecontroller::class, 'store'])->name('user.store');
    
    Route::get('/edit{id}', [homecontroller::class, 'edit'])->name('user.edit');
    Route::put('/update{id}', [homecontroller::class, 'update'])->name('user.update');
    Route::delete('/delete{id}', [homecontroller::class, 'delete'])->name('user.delete');

});