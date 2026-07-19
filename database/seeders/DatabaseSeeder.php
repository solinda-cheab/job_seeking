<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'anhadmin@gmail.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('secret009'),
            'role' => 'admin',
            'preferred_language' => 'English',
            'email_verified_at' => now(),
        ]);

        $user = User::where('email', 'anhadmin@gmail.com')->first();

        if ($user) {
            Admin::updateOrCreate([
                'user_id' => $user->id,
            ], [
                'admin_code' => 'admin-001',
                'title' => 'Administrator',
                'phone' => '+85500000000',
            ]);
        }
    }
}
