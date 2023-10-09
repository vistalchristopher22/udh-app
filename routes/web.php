<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentServiceProcessController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'document-process', 'as' => 'document-process.'], function () {
    Route::get('{document}', [DocumentServiceProcessController::class, 'create'])->name('create');
    Route::post('{document}', [DocumentServiceProcessController::class, 'store'])->name('store');

    Route::get('{document}/edit', [DocumentServiceProcessController::class, 'edit'])->name('edit');
    Route::put('{document}', [DocumentServiceProcessController::class, 'update'])->name('update');
    Route::delete('{document}/delete', [DocumentServiceProcessController::class, 'destroy'])->name('destroy');
});

Route::resources([
    'office' => OfficeController::class,
    'position' => PositionController::class,
    'employee' => EmployeeController::class,
    'document' => DocumentController::class,
    'roles' => RoleController::class,
    'file-manager' => FileManagerController::class,
    'tags' => TagController::class,
    'categories' => CategoryController::class,
]);
