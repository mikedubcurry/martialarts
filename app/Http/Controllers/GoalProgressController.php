<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalProgressRequest;
use App\Models\Goal;

class GoalProgressController extends Controller
{
    public function store(StoreGoalProgressRequest $request, Goal $goal)
    {
        $goal->goalProgresses()->create([
            'note' => $request->note,
        ]);

        return redirect()->route('goals.index');
    }
}
