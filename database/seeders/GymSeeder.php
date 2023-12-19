<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('gyms')->insert([
                'name' => fake()->name,
                'address' => fake()->streetAddress,
                'city' => fake()->city,
                'state' => fake()->stateAbbr,
                'zip' => fake()->postcode,
                'phone' => fake()->numerify('###-###-####'),
                'slug' => fake()->slug,
            ]);
        }

        DB::table('gyms')->insert([
            'name' => 'Sukhti Muay Thai and MMA',
            'address' => '527 Central Ave',
            'city' => 'Albany',
            'state' => 'NY',
            'zip' => '12206',
            'phone' => '518-949-0436',
            'slug' => 'sukhti-muay-thai-and-mma',
        ]);
    }
}
