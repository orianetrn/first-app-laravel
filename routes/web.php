<?php

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

Route::get('/login', function (){
    return 'login';
})-> name('login');

Route::get('/users',[UsersController::class, 'index'])-> name('users.index');

Route::get('/users/{user}',[UsersController::class, 'show'])-> name('users.show');

Route::delete('/users/{user}',[UsersController::class, 'destroy'])-> name('users.destroy');

Route::get('/users/{user}/form_update',[UsersController::class, 'form_update'])-> name('users.form_update');

Route::put('/users/{user}/update',[UsersController::class, 'update'])-> name('users.update');

Route::get('/form_create',[UsersController::class, 'form_create'])-> name('users.form_create');

Route::put('/create',[UsersController::class, 'create'])-> name('users.create');
