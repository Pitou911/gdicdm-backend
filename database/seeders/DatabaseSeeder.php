<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gdicdm.gov.kh'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('Admin@2024'),
                'role'     => 'admin',
            ]
        );

        // promote existing admin account if it was created before role column existed
        User::where('email', 'admin@gdicdm.gov.kh')->where('role', 'officer')->update(['role' => 'admin']);
    }
}
