<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Leo',
            'last_name' => 'Venticola',
            'email' => 'admin@patitag.com.ar',
            'password' => Hash::make(12345678),
        ]);

        $user->assignRole('Admin');
    }
}
