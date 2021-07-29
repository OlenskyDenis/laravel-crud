<?php

use App\Http\Controllers\DepartmantController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/employees', EmployeeController::class);

Route::get('/departmants', [DepartmantController::class, 'index'])->name('departmants.index');
Route::get('/departmants/create', [DepartmantController::class, 'create'])->name('departmants.create');
Route::post('/departmants', [DepartmantController::class, 'store'])->name('departmants.store');
Route::get('/departmants/{departmant}', [DepartmantController::class, 'show'])->name('departmants.show');
Route::get('/departmants/{departmant}/edit', [DepartmantController::class, 'edit'])->name('departmants.edit');
Route::put('/departmants/{departmant}', [DepartmantController::class, 'update'])->name('departmants.update');
Route::delete('/departmants/{departmant}', [DepartmantController::class, 'destroy'])->name('departmants.destroy');
