<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recovery;
use Inertia\Inertia;
use App\Http\Requests\StoreRecoveryRequest;

class RecoveryController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->user();
        return Inertia::render('Recoveries/Create', ['user' => $user]);
    }

    public function store(StoreRecoveryRequest $request)
    {
        $request->user()->recoveries()->create($request->validated());

        return redirect()->route('home');
    }

    public function destroy(Recovery $recovery)
    {
        $recovery->delete();

        return redirect()->route('home');
    }

    public function update(StoreRecoveryRequest $request, Recovery $recovery)
    {
        $recovery->update([...$request->validated(), 'user_id' => $request->user()->id]);

        return redirect()->route('home');
    }
}
