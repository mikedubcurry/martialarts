<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use Inertia\Inertia;
use App\Http\Requests\GymStoreRequest;
use App\Http\Requests\SearchGymRequest;
use App\Models\Discipline;
use Illuminate\Support\Facades\DB;

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
// TODO: Fix search
// - normalize data to uppercase (or migration to normalize data)
// - use LIKE to match text
        $gyms = Gym::where(DB::raw('UPPER(name)'), 'LIKE', '%' . strtoupper($request->query('discipline')) . '%')
            ->orWhere(DB::raw('UPPER(city)'), 'LIKE', '%' . strtoupper($request->query('discipline')) . '%')
            ->orWhere(DB::raw('UPPER(state)'), 'LIKE', '%' . strtoupper($request->query('discipline')) . '%')
            ->orWhere(DB::raw('UPPER(zip)'), 'LIKE', '%' . strtoupper($request->query('discipline')) . '%')
            ->orWhere(DB::raw('UPPER(address)'), 'LIKE', '%' . strtoupper($request->query('discipline')) . '%')
        //$gyms = Gym::whereRaw("UPPER('name') LIKE %" . strtoupper($request->query('query')) . "%")
        //    ->orWhereRaw("UPPER('city') LIKE %" . strtoupper($request->query('query')) . "%")
        //    ->orWhereRaw("UPPER('state') LIKE %" . strtoupper($request->query('query')) . "%")
        //    ->orWhereRaw("UPPER('zip') LIKE %" . strtoupper($request->query('query')) . "%")
        //    ->orWhereRaw("UPPER('address') LIKE %" . strtoupper($request->query('query')) . "%")
            ->get()
            ->load('disciplines')
            ->filter(function ($gym) use ($request) {
                if ($request->query('discipline')) {
                    return $gym->disciplines->contains('discipline', $request->query('discipline'));
                } else {
                    return $gym->disciplines->filter(function ($discipline) use ($request) {
                        return $discipline->discipline === $request->query('query');
                    })->count() > 0;
                }
                return true;
            })->values();

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
