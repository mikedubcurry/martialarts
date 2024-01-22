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
            'discipline' => 'muay thai',
            'slug' => 'muay-thai',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'boxing',
            'slug' => 'boxing',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'brazilian jiu jitsu',
            'slug' => 'bjj',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'wrestling',
            'slug' => 'wrestling',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'mixed martial arts',
            'slug' => 'mma',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'kickboxing',
            'slug' => 'kickboxing',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'judo',
            'slug' => 'judo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'karate',
            'slug' => 'karate',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'taekwondo',
            'slug' => 'taekwondo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'kung fu',
            'slug' => 'kung-fu',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'capoeira',
            'slug' => 'capoeira',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'krav maga',
            'slug' => 'krav-maga',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'sambo',
            'slug' => 'sambo',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'jeet kune do',
            'slug' => 'jeet-kune-do',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'aikido',
            'slug' => 'aikido',
        ]);

        DB::table('disciplines')->insert([
            'discipline' => 'hapkido',
            'slug' => 'hapkido',
        ]);
    }
}
