<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/users',[UsersController::class, 'index'])-> name('users.index')->middleware('auth');

Route::get('/users/{user}',[UsersController::class, 'show'])-> name('users.show')->middleware('auth');

Route::delete('/users/{user}',[UsersController::class, 'destroy'])-> name('users.destroy')->middleware('auth');

Route::get('/users/{user}/form_update',[UsersController::class, 'form_update'])-> name('users.form_update')->middleware('auth');

Route::put('/users/{user}/update',[UsersController::class, 'update'])-> name('users.update')->middleware('auth');

Route::get('/form_create',[UsersController::class, 'form_create'])-> name('users.form_create')->middleware('auth');

Route::put('/create',[UsersController::class, 'create'])-> name('users.create')->middleware('auth');
