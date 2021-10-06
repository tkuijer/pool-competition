<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('auth')->group(function () {
    Route::resource('/', GameController::class)->only(['index', 'create', 'store', 'destroy']);

    Route::get('/players', [PlayerController::class, 'index'])->name('player.index');
});

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('player', AdminPlayerController::class)->only(['index', 'store', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
