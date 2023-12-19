<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disciplines')->insert([
            'discipline' => 'Muay Thai',
            'slug' => 'muay-thai',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Boxing',
            'slug' => 'boxing',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Brazilian Jiu Jitsu',
            'slug' => 'bjj',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Wrestling',
            'slug' => 'wrestling',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Mixed Martial Arts',
            'slug' => 'mma',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Kickboxing',
            'slug' => 'kickboxing',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Judo',
            'slug' => 'judo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Karate',
            'slug' => 'karate',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Taekwondo',
            'slug' => 'taekwondo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Kung Fu',
            'slug' => 'kung-fu',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Capoeira',
            'slug' => 'capoeira',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Krav Maga',
            'slug' => 'krav-maga',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Sambo',
            'slug' => 'sambo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Jeet Kune Do',
            'slug' => 'jeet-kune-do',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Aikido',
            'slug' => 'aikido',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'Hapkido',
            'slug' => 'hapkido',
        ]);
    }
}
