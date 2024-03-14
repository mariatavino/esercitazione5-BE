<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attività;
use App\Models\progetto;
use Illuminate\Http\Request;

class AttivitàController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attivitàs = Attività::with('progetto')->get();
        return view('attività.index',compact('attivitàs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $progetti = progetto::all();
        return view('attività.create', compact('progetti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'descrizione' => 'required',
            'stato' => 'required',
            'data_scadenza' => 'required|date',
            'progetto_id' => 'required|integer',
        ]);

        $attività = new Attività($validated);
        $attività->save();

        return redirect()->route('attività.show', $attività)
            ->with('success', 'Attività creata con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attività $attività)
    {
        return view('attività.show', compact('attività'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attività $attività)
    {
        $progetti = progetto::all();
        return view('attività.edit', compact('attività', 'progetti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attività $attività)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'descrizione' => 'required',
            'stato' => 'required',
            'data_scadenza' => 'required|date',
            'progetto_id' => 'required|integer',
        ]);

        $attività->fill($validated);
        $attività->save();

        return redirect()->route('attività.show', $attività)
            ->with('success', 'Attività aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attività $attività)
    {
        $attività->delete();

        return redirect()->route('attività.index')
            ->with('success', 'Attività eliminata con successo.');
    }
}
