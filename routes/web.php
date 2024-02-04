<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('CarHome',[IndexController::class, 'index'])->name('index');

Route::get('listing',[IndexController::class, 'listing'])->name('listing');

Route::get('testimonials',[IndexController::class, 'testimonial'])->name('testimonials');

Route::get('blog',[IndexController::class, 'blog'])->name('blog');

Route::get('about',[IndexController::class, 'about'])->name('about');

Route::get('contact',[IndexController::class, 'contact'])->name('contact');

Route::post('contactus', [ContactController::class, 'contact'])->name('contactus');

Route::get('detail/{id}',[IndexController::class, 'single'])->name('single');

Route::fallback([IndexController::class, 'page404']);

Auth::routes(['verify'=>true]);