<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/attendance', function () {
    return view('pages/attendance');
})->middleware(['auth', 'verified']);
Route::get('/student-add', function () {
    return view('pages/studentAdd');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth', 'role:super_admin'])->group(function () {
  
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('admin.panel');
    });
     Route::get('/student-add', function () {
        return view('pages/studentAdd');
    });
});

Route::middleware(['auth', 'role:student'])->group(function () {
   
    
});