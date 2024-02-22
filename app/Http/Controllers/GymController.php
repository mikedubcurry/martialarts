<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use Inertia\Inertia;
use App\Http\Requests\GymStoreRequest;
use App\Models\Discipline;

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
        $gyms = Gym::where('name', 'LIKE', '%' . strtolower($request->query('search')) . '%')
            ->orWhere('city', 'LIKE', '%' . strtolower($request->query('search')) . '%')
            ->orWhere('state', 'LIKE', '%' . strtolower($request->query('search')) . '%')
            ->orWhere('zip', 'LIKE', '%' . strtolower($request->query('search')) . '%')
            ->orWhere('address', 'LIKE', '%' . strtolower($request->query('search')) . '%')
            ->get()
            ->load('disciplines')
            ->filter(function ($gym) use ($request) {
                if ($request->query('discipline')) {
                    return $gym->disciplines->contains('discipline', strtolower($request->query('discipline')));
                }
                return true;
            })
            ->values();

        return Inertia::render('Gym/Index', [
            'gyms' => $gyms,
        ]);
    }

    public function show(Gym $gym)
    {
        return Inertia::render('Gym/Show', [
            'gym' => $gym->load('disciplines'),
        ]);
    }

    public function create()
    {
        $disciplines = Discipline::all();
        return Inertia::render('Gym/Create', ['disciplines' => $disciplines]);
    }

    public function store(GymStoreRequest $request)
    {
        $gym = Gym::create($request->all());
        $disciplines = $request->input('disciplines');
        $gym->disciplines()->attach($disciplines);

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
