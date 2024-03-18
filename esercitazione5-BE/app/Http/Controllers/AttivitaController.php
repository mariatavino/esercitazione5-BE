<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attivita;
use App\Models\progetto;
use Illuminate\Http\Request;

class AttivitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attivitas = Attivita::with('progetto')->get();
        return view('attivita.index',compact('attivitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $progetti = progetto::all();
        return view('attivita.create', compact('progetti'));
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

        $attivita = new Attivita($validated);
        $attivita->save();

        return redirect()->route('progetti.show', $attivita->progetto_id)
            ->with('success', 'Attività creata con successo.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Attivita $attivita)
    {
        return view('attivita.show', compact('attivita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attivita $attivita)
    {
        $progetti = progetto::all();
        return view('attivita.edit', compact('attivita', 'progetti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attivita $attivita)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'descrizione' => 'required',
            'stato' => 'required',
            'data_scadenza' => 'required|date',
            'progetto_id' => 'required|integer',
        ]);

        $attivita->fill($validated);
        $attivita->save();

        return redirect()->route('attivita.show', $attivita)
            ->with('success', 'Attività aggiornata con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attivita $attivita)
    {
        $attivita->delete();

        return redirect()->route('progetti.index')
            ->with('success', 'Attività eliminata con successo.');
    }
}
