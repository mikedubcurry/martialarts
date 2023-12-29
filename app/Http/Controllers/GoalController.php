<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalRequest;
use App\Models\Goal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GoalController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $goals = $user->goals()->get();

        return Inertia::render('Goals/Index', [
            'goals' => $goals,
            'user' => $user,
        ]);
    }

    public function create()
    {
        return Inertia::render('Goals/Create');
    }

    public function store(StoreGoalRequest $request)
    {
        $user = $request->user();
        $user->goals()->create([
            'goal' => $request->goal,
            'date' => Carbon::now(),
        ]);

        return redirect()->route('goals.index');
    }

    public function show(Goal $goal)
    {
        $goal->load('goalProgresses');
        return Inertia::render('Goals/Show', [
            'goal' => $goal,
        ]);
    }

    public function edit(Goal $goal)
    {
        return Inertia::render('Goals/Edit', [
            'goal' => $goal,
        ]);
    }

    public function update(StoreGoalRequest $request, Goal $goal)
    {
        $request->validate([
            'goal' => 'required',
        ]);

        $goal->update([
            'goal' => $request->goal,
        ]);

        return redirect()->route('goals.index');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->route('goals.index');
    }
}
