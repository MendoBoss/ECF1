<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('task.index');
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// gestion tasks
Route::get('/',[TaskController::class, 'index'])->name('task.index');
Route::middleware('auth')->group(function () {
    Route::get('/add',[TaskController::class, 'add'])->name('task.add');
    Route::post('/add',[TaskController::class, 'storage'])->name('task.storage');
    Route::get('/update/{task}',[TaskController::class, 'update'])->name('task.update');
    Route::post('/edit/{task}',[TaskController::class, 'edit'])->name('task.edit');
    Route::get('/state/{id}',[TaskController::class, 'state'])->name('task.state');
    Route::get('/delete/{id}',[TaskController::class, 'delete'])->name('task.delete');
});

require __DIR__.'/auth.php';
