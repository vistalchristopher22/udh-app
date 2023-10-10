<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\DocumentDownloadController;

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

Route::get('profile/{id}', function (int $id) {
    return User::find($id);
});

Route::get('files', function () {
    return Document::get();
});

Route::get('tags', function () {
    return Tag::withCount('documents')
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
});

Route::get('tag/{id}', function (int $id) {
    return Tag::find($id);
});

Route::delete('tag', function () {
    Tag::find(request()->id)->delete();

    return response()->json(['success' => true]);
});

Route::post('tag', function () {
    if (request()->has('id') && request()->id) {
        $tag = Tag::find(request()->id);
        $tag->name = request()->name;
        $tag->save();
    } else {
        $tag = Tag::create([
            'name' => request()->name,
        ]);
    }
    return response()->json($tag);
});


Route::get('categories', function () {
    $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
    return response()->json($categories);
});

Route::get('category/{id}', function (int $id) {
    $category = Category::find($id);
    return response()->json($category);
});

Route::post('category', function () {
    if (request()->has('id') && request()->id) {
        $category = Category::find(request()->id);
        $category->name = request()->name;
        $category->description = request()->description;
        $category->slug = Str::slug(request()->name);
        $category->save();
    } else {
        $category = Category::create([
            'name' => request()->name,
            'description' => request()->description,
            'slug' => Str::slug(request()->name),
        ]);
    }
    return response()->json($category);
});

Route::delete('category', function () {
    Category::find(request()->id)->delete();
    return response()->json(['success' => true]);
});
