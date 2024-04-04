<?php

use App\Http\Controllers\AddCategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Models\Categories;
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

Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::post('/', [HomeController::class, 'store'])->name('home.store');

//  route for login
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    // basic route for admin
    Route::get('/admin', [DashboardController::class, 'Index'])->name('admin');
    Route::get('/admin/category', [CategoriesController::class, 'Index'])->name('category');
    Route::get('/admin/items', [ItemsController::class, 'Index'])->name('items');
    Route::get('/admin/inquries', [InquiryController::class, 'Index'])->name('inquries');

    // route for categories
    Route::get('/admin/category/add', [CategoriesController::class, 'add'])->name('category.form');
    Route::get('/admin/category/edit/{id}', [CategoriesController::class, 'show'])->name('category.show');
    Route::post('/admin/category/add', [CategoriesController::class, 'store'])->name('category.store');
    Route::put('/admin/category/update/{categories}', [CategoriesController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/delete/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');

    // route for items
    Route::get('/admin/items/add', [ItemsController::class, 'add'])->name('items.form');
    Route::get('/admin/items/edit/', [ItemsController::class, 'show'])->name('items.show');
 //  Route::put('/admin/items/update/{items}', [ItemsController::class, 'update'])->name('items.update');
    Route::delete('/admin/items/delete/{id}', [ItemsController::class, 'destroy'])->name('items.destroy');

    // route for inquiry
    Route::get('/admin/inquiries/', [InquiryController::class, 'Index'])->name('inquiries');
    Route::put('/admin/inquiries/update/{inquiries}', [InquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('/admin/inquiries/delete/{id}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');


});

 // register populate
 Route::post('/admin/login/populate', [AuthController::class, 'store'])->name('populate');
