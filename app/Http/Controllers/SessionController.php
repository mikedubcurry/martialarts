<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Discipline;
use App\Models\Gym;
use App\Models\SessionPromptAnswer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create()
    {
        $gyms = Gym::all()->load('disciplines.prompts');
        return Inertia::render('Session/Create', [
            'gyms' => $gyms,
        ]);
    }

    public function store(Request $request)
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

        collect($request->prompts)->each(function ($prompt) use ($session) {
            SessionPromptAnswer::create([
                'prompt_id' => $prompt['id'],
                'answer' => $prompt['answer'],
                'gym_session_id' => $session->id,
            ]);
        });

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
