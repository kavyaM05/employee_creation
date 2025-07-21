<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/', 'index')->name('employee.index');
    Route::post('save', 'save')->name('employee.save');
    Route::get('list', 'list')->name('employee.list');
    Route::get('export', 'export')->name('employee.export');
});
