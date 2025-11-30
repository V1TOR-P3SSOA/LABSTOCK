<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReagentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('reagents', ReagentController::class);
    Route::resource('equipments', EquipmentController::class);
    Route::resource('researches', ResearchController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('suppliers', SupplierController::class);
});


require __DIR__.'/auth.php';
