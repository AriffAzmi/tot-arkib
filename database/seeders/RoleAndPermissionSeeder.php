<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $staff = Role::create(['name' => 'staff']);
        Permission::create(['name' => 'Tambah Bahagian']);
        Permission::create(['name' => 'Edit Bahagian']);
        Permission::create(['name' => 'Delete Bahagian']);
        Permission::create(['name' => 'Tambah Seksyen']);
        Permission::create(['name' => 'Edit Seksyen']);
        Permission::create(['name' => 'Delete Seksyen']);

    }
}
