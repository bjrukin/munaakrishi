<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::where('username', 'superadmin')->delete();
        $admin = new admin;
        $admin->name = 'Super Admin';
        $admin->email = 'info@nepalfashiononline.com';
        $admin->username = 'superadmin';
        $admin->password = Hash::make('admin@2025');
        $admin->role_id = 1;
        $admin->save();

        Admin::where('username', 'admin')->delete();
        $admin = new admin;
        $admin->name = 'Admin';
        $admin->email = 'admin@nepalfashiononline.com';
        $admin->username = 'admin';
        $admin->password = Hash::make('admin@2025');
        $admin->role_id = 2;
        $admin->save();
    }
}
