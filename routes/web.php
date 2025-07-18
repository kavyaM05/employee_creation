<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::post('save', [EmployeeController::class, 'save'])->name('employee.save');
Route::get('list', [EmployeeController::class, 'list'])->name('employee.list');
Route::get('export', [EmployeeController::class, 'export'])->name('employee.export');
