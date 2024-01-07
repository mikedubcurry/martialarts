<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Discipline;
use App\Models\Gym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create()
    {
        //$disciplines = Discipline::all();
        $gyms = Gym::all()->load('disciplines');
        return Inertia::render('Session/Create', [
         //   'disciplines' => $disciplines,
            'gyms' => $gyms,
        ]);
    }

    public function store(StoreSessionRequest $request)
    {
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

    public function update(UpdateSessionRequest $request, $id)
    {
        $session = $request->user()->gymSessions()->findOrFail($id);
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
