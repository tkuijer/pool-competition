<?php

use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [GameController::class, 'index'])->name('game.index');
    Route::get('/new-game', [GameController::class, 'create'])->name('game.create');
    Route::post('/', [GameController::class, 'store'])->name('game.store');

    Route::get('/players', [PlayerController::class, 'index'])->name('player.index');

    Route::get('/compare/{player1}/{player2}', [CompareController::class, 'show'])->name('compare.show');
});

Route::middleware(['auth', 'auth.admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return inertia('Dashboard');
    })->name('dashboard');

    Route::resource('player', AdminPlayerController::class)->only(['index', 'store', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
