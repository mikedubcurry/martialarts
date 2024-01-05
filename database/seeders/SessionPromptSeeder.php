<?php

namespace Database\Seeders;

use App\Models\SessionPrompt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionPromptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompts = [
            'Drills',
            'Warmup',
            'Sparring',
            'Conditioning',
            'Wins',
            'Losses',
        ];

        foreach ($prompts as $prompt) {
            SessionPrompt::create([
                'prompt' => $prompt,
                'discipline_id' => 1,
            ]);
        }
    }
}
