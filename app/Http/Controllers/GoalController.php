<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GoalController extends Controller
{
    public function index(Request $request)
    {
        $goals = Goal::all()->load('disciplines');
        $user = $request->user();

        return Inertia::render('Goals/Index', [
            'goals' => $goals,
            'user' => $user,
        ]);
    }
}
