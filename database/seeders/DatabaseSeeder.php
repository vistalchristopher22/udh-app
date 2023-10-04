<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Document;
use App\Models\Office;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Office::factory(1)->create();
        Position::factory(1)->create();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Role
        $role = Role::create([
            'name' => 'administrator',
        ]);

        // Create Permission
        Permission::create(['name' => 'create office']);
        Permission::create(['name' => 'edit office']);
        Permission::create(['name' => 'delete office']);

        Permission::create(['name' => 'create position']);
        Permission::create(['name' => 'edit position']);
        Permission::create(['name' => 'delete position']);

        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'edit employee']);
        Permission::create(['name' => 'delete employee']);

        foreach (Permission::get() as $permission) {
            $role->givePermissionTo($permission);
        }

        $user = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        $user->assignRole($role);

        User::factory(1)->create();
        //        Document::factory(50)->create();
    }
}