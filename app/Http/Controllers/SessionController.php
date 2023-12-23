<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Gym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        $disciplines = Discipline::all();
        $gyms = Gym::all();
        return Inertia::render('Session/Create', [
            'disciplines' => $disciplines,
            'gyms' => $gyms,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'discipline_id' => 'required|exists:disciplines,id',
            'gym_id' => 'required|exists:gyms,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $session = $request->user()->gymSessions()->create([
            'discipline_id' => $request->discipline_id,
            'gym_id' => $request->gym_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        if ($request->notes) $session->notes()->create([
            'note' => $request->notes,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Request $request, $id)
    {
        $session = $request->user()->gymSessions()->findOrFail($id);
        $session->delete();
        return redirect()->route('home');
    }

    public function update(Request $request, $id)
    {
        $session = $request->user()->gymSessions()->findOrFail($id);
        $request->validate([
            'notes' => 'nullable|string',
        ]);
        if ($request->notes) {
            $notes = $session->notes()->count() ? $session->notes()->update([
                'note' => $request->notes,
                'user_id' => $request->user()->id,
            ]) : $session->notes()->create([
                'note' => $request->notes,
                'user_id' => $request->user()->id,
            ]);
        }
        return redirect()->route('home');
    }
}
