<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionPromptRequest;
use App\Models\Discipline;

class SessionPromptController extends Controller
{
    public function sessionPrompts(Discipline $discipline)
    {
        $prompts = $discipline->prompts;

        return response()->json([
            'prompts' => $prompts,
        ]);
    }
}
