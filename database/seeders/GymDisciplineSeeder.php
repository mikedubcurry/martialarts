<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gym;
use App\Models\Discipline;

class GymDisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gyms = Gym::all();
        $disciplines = Discipline::all();

        foreach ($gyms as $gym) {
            $gym->disciplines()->attach($disciplines->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
