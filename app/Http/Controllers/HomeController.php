<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $gyms = Gym::all();

        return Inertia::render('Home/Index', [
            'gyms' => $gyms
        ]);
    }
}
