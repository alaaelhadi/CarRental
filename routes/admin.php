<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::prefix('admin')->middleware('verified')->controller(UserController::class)->group(function(){
    Route::get('usersList', 'index')->name('user');
    Route::get('addUser', 'create')->name('addUser');
    Route::post('addedUser', 'store')->name('addedUser');
    Route::get('editUser/{id}', 'edit');
    Route::put('updateUser/{id}', 'update')->name('updateUser');
});

Route::prefix('admin')->middleware('verified')->controller(CategoryController::class)->group(function(){
    Route::get('categoriesList', 'index')->name('category');
    Route::get('addCategory', 'create')->name('addCategory');
    Route::post('addedCategory', 'store')->name('addedCategory');
    Route::get('editCategory/{id}', 'edit');
    Route::put('updateCategory/{id}', 'update')->name('updateCategory');
    Route::get('deleteCategory/{id}', 'destroy');
});

Route::prefix('admin')->middleware('verified')->controller(CarController::class)->group(function(){
    Route::get('carsList', 'index')->name('car');
    Route::get('addCar', 'create')->name('addCar');
    Route::post('addedCar', 'store')->name('addedCar');
    Route::get('editCar/{id}', 'edit');
    Route::put('updateCar/{id}', 'update')->name('updateCar');
    Route::get('deleteCar/{id}', 'destroy');
});

Route::prefix('admin')->middleware('verified')->controller(TestimonialController::class)->group(function(){
    Route::get('testimonialsList', 'index')->name('testimonial');
    Route::get('addTestimonial', 'create')->name('addTestimonial');
    Route::post('addedTestimonial', 'store')->name('addedTestimonial');
    Route::get('editTestimonial/{id}', 'edit');
    Route::put('updateTestimonial/{id}', 'update')->name('updateTestimonial');
    Route::get('deleteTestimonial/{id}', 'destroy');
});

Route::prefix('admin')->middleware('verified')->controller(ContactController::class)->group(function(){
    Route::get('messagesList', 'index')->name('message');
    Route::get('showContact/{id}', 'show')->name('showContact');
    Route::get('deleteContact/{id}', 'destroy');
});

Route::get('logout',[LoginController::class, 'logout'])->name('logout');