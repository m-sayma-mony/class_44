<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowToUseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;


// frontend start
Route::get('/', [HomeController::class, 'loadHomePage'])->name('home');
Route::get('/about', [AboutController::class, 'loadAboutPage'])->name('about');
Route::get('/all-product', [ProductController::class, 'loadProductPage'])->name('all-product');
Route::get('/show-product-details/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/feature', [FeatureController::class, 'loadFeaturePage'])->name('feature');
Route::get('/how-to-use', [HowToUseController::class, 'loadHowToUsePage'])->name('how-to-use');
Route::get('/testimonial', [TestimonialController::class, 'loadTestimonialPage'])->name('testimonial');
Route::get('/blog', [BlogController::class, 'loadBlogPage'])->name('blog');
Route::get('/error', [ErrorController::class, 'loadErrorPage'])->name('error');
Route::get('/contact', [ContactController::class, 'loadContactPage'])->name('contact');
// frontend end



// backend start
Route::get('/dashbord', [AdminController::class, 'loadAdminPage'])->name('dashbord');
Route::get('/add-product', [ProductController::class, 'create'])->name('create');
Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('destroy');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('update');
Route::post('/store-product', [ProductController::class, 'store'])->name('store');
// backend end
