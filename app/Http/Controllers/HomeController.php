<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Gym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()) return redirect()->route('login');

        $user = $request->user();
        $gyms = Gym::all();
        $disciplines = Discipline::all();

        return Inertia::render('Home/Index', [
            'gyms' => $gyms,
            'user' => $user->load(['gymSessions.discipline', 'gymSessions.notes', 'gymSessions.gym', 'recoveries']),
            'disciplines' => $disciplines,
        ]);
    }

    public function login()
    {
        return Inertia::render('Login/Index');
    }
}
