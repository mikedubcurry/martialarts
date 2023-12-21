<?php

namespace Database\Seeders;

use App\Models\User;
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

        $gym = \App\Models\Gym::where('name', 'Sukhti Muay Thai and MMA')->first();
        $disciplines = \App\Models\Discipline::whereIn('id', [1, 3, 4, 5, 11])->get();
        $gym->disciplines()->attach($disciplines);
        $gym->save();

        $user = User::where('id', 11)->first();

        \App\Models\GymSession::create([
            'user_id' => $user->id,
            'gym_id' => $gym->id,
            'discipline_id' => 1,
            'date' => now()->subDays(3),
            'start_time' => now()->subHours(2),
            'end_time' => now()->subHours(1),
        ]);
        \App\Models\GymSession::create([
            'user_id' => $user->id,
            'gym_id' => $gym->id,
            'discipline_id' => 11,
            'date' => now()->subDays(2),
            'start_time' => now()->subHours(2),
            'end_time' => now()->subHours(1),
        ]);
        \App\Models\GymSession::create([
            'user_id' => $user->id,
            'gym_id' => $gym->id,
            'discipline_id' => 3,
            'date' => now()->subDays(1),
            'start_time' => now()->subHours(2),
            'end_time' => now()->subHours(1),
        ]);
        \App\Models\Recovery::create([
            'user_id' => $user->id,
            'date' => now()->subDays(3),
            'type' => 'epsom salt bath',
            'notes' => 'I felt great after this bath',
        ]);
    }
}
