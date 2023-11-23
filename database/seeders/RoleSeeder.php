<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'users.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.update'])->assignRole($role1);
        Permission::create(['name' => 'users.destroy'])->assignRole($role1);
        // Permission::create(['name' => 'users.index']);

        Permission::create(['name' => 'services.index'])->assignRole($role1);
        Permission::create(['name' => 'services.create'])->assignRole($role1);
        Permission::create(['name' => 'services.edit'])->assignRole($role1);
        Permission::create(['name' => 'services.update'])->assignRole($role1);
        Permission::create(['name' => 'services.destroy'])->assignRole($role1);

        Permission::create(['name' => 'payments.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'payments.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'payments.edit'])->assignRole($role1);
        Permission::create(['name' => 'payments.update'])->assignRole($role1);
        Permission::create(['name' => 'payments.destroy'])->assignRole($role1);

    }
}
