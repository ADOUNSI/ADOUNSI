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

Route::get('/trajets', [TrajetController::class, 'index'])->name('trajets.index');
Route::get('/bus', fn() => view('bus.index'))->name('bus.index');
Route::get('/train', fn() => view('train.index'))->name('train.index');
Route::get('/aide', fn() => view('aide'))->name('aide');
Route::get('/recherche-trajets', [TrajetController::class, 'recherche'])->name('trajets.recherche');
Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
Route::post('/trajets', [TrajetController::class, 'store'])->name('trajets.store');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');








