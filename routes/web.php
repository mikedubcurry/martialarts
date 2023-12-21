<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('gyms', GymController::class);
Route::resource('disciplines', DisciplineController::class);
Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
Route::get('/login', [HomeController::class, 'login'])->name('login');


