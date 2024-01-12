<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalProgressRequest;
use App\Models\Goal;

class GoalProgressController extends Controller
{
    public function create(Goal $goal)
    {
        $user = auth()->user();
        $sessions = $user->gymSessions->load('discipline');

        return inertia('Goals/Progress/Create', [
            'goal' => $goal,
            'sessions' => $sessions,
        ]);
    }

    public function store(StoreGoalProgressRequest $request, Goal $goal)
    {
        $goal->goalProgresses()->create([
            'note' => $request->note,
            'session_id' => $request->session_id,
        ]);

        return redirect()->route('goals.index');
    }
}
