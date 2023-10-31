<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\Office;
use App\Models\Category;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Requirement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
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

Route::get('view-requirements/{document}', function (int $document) {
    return Requirement::where('document_id', $document)->get();
});

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

Route::get('offices', function () {
    return Office::orderBy('code', 'ASC')->get();
});

Route::get('positions', function () {
    return Position::get();
});

Route::post('profile/personal-information', function () {
    $employee = Employee::find(request()->employee_id);
    $employee->first_name = request()->first_name;
    $employee->last_name = request()->last_name;
    $employee->middle_name = request()->middle_name;
    $employee->suffix = request()->suffix;
    $employee->email = request()->email;
    $employee->phone_number = request()->phone_number;
    $employee->address = request()->address;
    $employee->save();

    return response()->json(['data' => $employee, 'success' => true]);
});

Route::post('profile/account-information', function () {
    $user = User::find(request()->id);
    $employee = $user->information;
    $user->email = request()->email;
    if (request()->has('password') && !is_null(request()->password)) {
        $user->password = bcrypt(request()->password);
    }
    $user->save();
    $employee->email = request()->email;
    $employee->save();

    return response()->json(['success' => true]);
});

Route::get('user-visits-activities/{id}', function ($id) {
    return DB::table('visits_monitoring')->where('user_id', $id)->paginate(10);
});

Route::get('user-authentications-activities/{id}', function ($id) {
    return DB::table('authentications_monitoring')->where('user_id', $id)->paginate(10);
});
