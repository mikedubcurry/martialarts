<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\RecoveryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');
Route::patch('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');

Route::get('/recoveries/create', [RecoveryController::class, 'create'])->name('recoveries.create');
Route::post('/recoveries', [RecoveryController::class, 'store'])->name('recoveries.store');
Route::delete('/recoveries/{recovery}', [RecoveryController::class, 'destroy'])->name('recoveries.destroy');
Route::patch('/recoveries/{recovery}', [RecoveryController::class, 'update'])->name('recoveries.update');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gyms', [GymController::class, 'index'])->name('gyms.index');
Route::get('/gyms/search', [GymController::class, 'search'])->name('gyms.search');
Route::get('/gyms/{gym:slug}', [GymController::class, 'show'])->name('gyms.show');

require __DIR__ . '/auth.php';
