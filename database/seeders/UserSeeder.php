<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => fake()->name,
                'email' => fake()->email,
                'password' => Hash::make('password'),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Michael Curry',
            'email' => 'michaelcurry95@gmail.com',
            'password' => Hash::make('password'),
        ]);

    }
}
