<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'status' => 1
        ]);

        $admin->givePermissionTo('Tambah Bahagian','Edit Bahagian','Delete Bahagian','Tambah Seksyen','Edit Seksyen','Delete Seksyen');
    }
}
