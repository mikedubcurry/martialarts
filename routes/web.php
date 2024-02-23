<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\GoalProgressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\SessionPromptController;

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


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
    Route::delete('/sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::patch('/sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');

    Route::get('/recoveries/create', [RecoveryController::class, 'create'])->name('recoveries.create');
    Route::post('/recoveries', [RecoveryController::class, 'store'])->name('recoveries.store');
    Route::delete('/recoveries/{recovery}', [RecoveryController::class, 'destroy'])->name('recoveries.destroy');
    Route::patch('/recoveries/{recovery}', [RecoveryController::class, 'update'])->name('recoveries.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/gyms', [GymController::class, 'index'])->name('gyms.index');
    Route::get('/gyms/search', [GymController::class, 'search'])->name('gyms.search');
    Route::get('/gyms/create', [GymController::class, 'create'])->name('gyms.create');
    Route::post('/gyms', [GymController::class, 'store'])->name('gyms.store');
    Route::get('/gyms/{gym:slug}', [GymController::class, 'show'])->name('gyms.show');

    Route::get('/goals', [GoalController::class, 'index'])->name('goals.index');
    Route::get('/goals/create', [GoalController::class, 'create'])->name('goals.create');
    Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');
    Route::get('/goals/{goal}', [GoalController::class, 'show'])->name('goals.show');
    Route::get('/goals/{goal}/edit', [GoalController::class, 'edit'])->name('goals.edit');
    Route::patch('/goals/{goal}', [GoalController::class, 'update'])->name('goals.update');
    Route::delete('/goals/{goal}', [GoalController::class, 'destroy'])->name('goals.destroy');
    Route::get('/goals/{goal}/progress', [GoalProgressController::class, 'create'])->name('goals.progress.create');
    Route::post('/goals/{goal}/progress', [GoalProgressController::class, 'store'])->name('goals.progress.store');

});


require __DIR__ . '/auth.php';
