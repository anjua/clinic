<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $role = Role::create([
            'name'        => 'Superadmin',
            'description' => 'Role for Super administrator',
        ]);
        $permissions = Permission::get();
        $permission_ids = $permissions->pluck('id')->toArray();
        $role->permissions()->attach($permission_ids);
    }
}
