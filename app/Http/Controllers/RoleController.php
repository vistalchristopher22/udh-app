<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::withCount('permissions')->get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::get(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $role = Role::create([
                'name' => Str::lower($request->name),
            ]);

            $permissions = Permission::whereIn('id', array_keys($request->permissions))->get();

            foreach ($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        });

        return back()->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        $role = $role->load('permissions');

        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'rolePermissions' => $role->permissions->pluck('id')->toArray(),
        ]);
    }

    public function update(Role $role, UpdateRequest $request)
    {
        DB::transaction(function () use ($request, &$role) {
            $role->name = Str::lower($request->name);
            $role->save();

            $role->syncPermissions(array_keys($request->permissions));
        });

        return back()->with('success', 'Role updated successfully');
    }
}
