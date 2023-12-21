<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // lets pretend we have an authenticated user
        $user = User::where('id', 11)->first();
        $gyms = Gym::all();
        $disciplines = Discipline::all();

        return Inertia::render('Home/Index', [
            'gyms' => $gyms,
            'user' => $user->load(['gymSessions.discipline', 'recoveries']),
            'disciplines' => $disciplines,
        ]);
    }

    public function login(Request $request)
    {
        return Inertia::render('Login/Index');
    }
}
