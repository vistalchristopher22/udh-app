<?php

use App\Http\Controllers\Auth\AccountSetupController;
use App\Http\Controllers\Auth\GoogleSignInController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserFileController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\DocumentServiceProcessController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'document-process', 'as' => 'document-process.', 'middleware' => 'setup.account'], function () {
    Route::get('{document}', [DocumentServiceProcessController::class, 'create'])->name('create');
    Route::post('{document}', [DocumentServiceProcessfController::class, 'store'])->name('store');

    Route::get('{document}/edit', [DocumentServiceProcessController::class, 'edit'])->name('edit');
    Route::put('{document}', [DocumentServiceProcessController::class, 'update'])->name('update');
    Route::delete('{document}/delete', [DocumentServiceProcessController::class, 'destroy'])->name('destroy');
});

Route::group(['middleware' => 'setup.account'], function () {
    Route::get('/folders', [FolderController::class, 'index']);
    Route::post('/folders', [FolderController::class, 'store']);

    Route::get('/file/folder-files', [UserFileController::class, 'getFilesByFolder']);
    Route::put('/file/{file}/move', [UserFileController::class, 'moveToFolder']);
    Route::get('/files/trash', [UserFileController::class, 'trash']);
    Route::get('/file/search', [UserFileController::class, 'search']);
    Route::post('/file/upload', [UserFileController::class, 'upload'])->name('file-manager.upload');
    Route::get('/file/files', [UserFileController::class, 'files'])->name('file-manager.files');
    Route::put('file/{file}/rename', [UserFileController::class, 'rename']);
    Route::delete('file/{file}', [UserFileController::class, 'destroy']);
});


Route::get('account-setup', [AccountSetupController::class, 'index'])->name('account-setup.index');
Route::post('account-setup', [AccountSetupController::class, 'store'])->name('account-setup.store');
Route::post('google-sign-in', GoogleSignInController::class);


Route::group(['middleware' => 'setup.account'], function () {
    Route::resources([
        'office' => OfficeController::class,
        'position' => PositionController::class,
        'employee' => EmployeeController::class,
        'document' => DocumentController::class,
        'roles' => RoleController::class,
        'file-manager' => FileManagerController::class,
        'tags' => TagController::class,
        'categories' => CategoryController::class,
        'profile' => ProfileController::class,
        'campus' => CampusController::class,
    ]);
});
