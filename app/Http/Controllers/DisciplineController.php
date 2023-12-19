<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Discipline;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::all();

        return Inertia::render('Disciplines/Index', [
            'disciplines' => $disciplines,
        ]);
    }

    public function show(Discipline $discipline)
    {
        return Inertia::render('Disciplines/Show', [
            'discipline' => $discipline,
        ]);
    }

    public function create()
    {
        return Inertia::render('Disciplines/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Discipline::create($request->all());

        return redirect()->route('disciplines.index');
    }

    public function edit(Discipline $discipline)
    {
        return Inertia::render('Disciplines/Edit', [
            'discipline' => $discipline,
        ]);
    }

    public function update(Request $request, Discipline $discipline)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $discipline->update($request->all());

        return redirect()->route('disciplines.index');
    }
}
