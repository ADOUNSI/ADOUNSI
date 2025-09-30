<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/daily', function () {
    return view('pages.daily');
})->name('daily.page');


Route::get('/bus', function () {
    return view('pages.bus');
})->name('bus.page');

Route::get('/carpool', function () {
    return view('pages.carpool');
})->name('carpool.page');


Route::get('/daily', function () {
    return view('pages.daily');
})->name('daily.page');

Route::get('/search-car-sharing', function () {
    return view('pages.search-car-sharing');
})->name('carsharing.search');

Route::get('/offer-seats', function () {
    return view('pages.offer-seats');
})->name('seats.offer');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register/dispatch', function () {
    return view('auth.register');
})->name('register.dispatch');

Route::get('/train', function () {
    return view('pages.train');
})->name('train.page');







