<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use Inertia\Inertia;
use App\Http\Requests\GymStoreRequest;
use App\Http\Requests\SearchGymRequest;

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
        $gyms = Gym::where('name', 'like', '%' . $request->query('query') . '%')
            ->orWhere('city', 'like', '%' . $request->query('query') . '%')
            ->orWhere('state', 'like', '%' . $request->query('query') . '%')
            ->orWhere('zip', 'like', '%' . $request->query('query') . '%')
            ->orWhere('address', 'like', '%' . $request->query('query') . '%')
            ->get()
            ->load('disciplines')
            ->filter(function ($gym) use ($request) {
                if ($request->query('discipline')) {
                    return $gym->disciplines->contains('id', $request->query('discipline'));
                } else {
                    return $gym->disciplines->filter(function ($discipline) use ($request) {
                        return $discipline->discipline === $request->query('query');
                    })->count() > 0;
                }
                return true;
            })->values();
        dd($gyms);
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
