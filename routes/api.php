<?php

use App\Http\Controllers\DocumentDownloadController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::post('permission-create', function () {
    Permission::create([
        'name' => request()->name,
    ]);

    return response()->json(['success' => true]);
});

Route::get('role-fetch-permissions/{id}', function (int $id) {
    return Role::with('permissions')
        ->find($id)?->permissions;
});

Route::get('document-download/{id}', DocumentDownloadController::class)->name('document.download');