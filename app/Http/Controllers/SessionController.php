<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('Session/Create');
    }
}
