<?php

use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)
        ->prefix('/manajemen_user')
        ->group(function(){
            Route::get('/', 'index')->name('manajemen_user.index');
            Route::get('/create','create')->name('manajemen_user.create');
            Route::post('/post','post')->name('manajemen_user.post');
            Route::delete('/{user}/delete', 'delete')->name('manajemen_user.delete');
        });

Route::controller(MataKuliahController::class)
        ->prefix('/manajemen_mata_kuliah')
        ->group(function(){
            Route::get('/', 'index')->name('manajemen_mata_kuliah.index');
        });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
