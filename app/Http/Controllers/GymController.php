<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use Inertia\Inertia;
use App\Http\Requests\GymStoreRequest;

class GymController extends Controller
{
    public function index(Request $request)
    {
        $gyms = Gym::all()->load('disciplines');
        $user = $request->user();

        return Inertia::render('Gym/Index', [
            'gyms' => $gyms,
            'user' => $user,
        ]);
    }

    public function search(Request $request)
    {
    }

    public function show(Gym $gym)
    {
        return Inertia::render('Gym/Show', [
            'gym' => $gym->load('disciplines'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Gym/Create');
    }

    public function store(GymStoreRequest $request)
    {
        Gym::create($request->all());

        return redirect()->route('gyms.index');
    }

    public function edit(Gym $gym)
    {
        return Inertia::render('Gym/Edit', [
            'gym' => $gym,
        ]);
    }

    public function update(Request $request, Gym $gym)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required|size:2',
            'zip' => 'required|size:5',
            'phone' => 'required',
            'slug' => 'required',
        ]);

        $gym->update($request->all());

        return redirect()->route('gyms.index');
    }

    public function disciplines(Gym $gym)
    {
        return Inertia::render('Gym/Disciplines/Index', [
            'gym' => $gym,
        ]);
    }
}
