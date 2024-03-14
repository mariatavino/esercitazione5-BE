<?php

namespace App\Http\Controllers;

use App\Models\progetto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgettoController extends Controller
{
    /**
     * Create a new controller instance.
     * Apply 'auth' middleware to all methods in this controller
     * except for 'index' and 'show'
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progetti = progetto::all();
        return view('progetti.index', ['progetti' => $progetti]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('progetti.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'descrizione' => 'required',
            'stato' => 'required|in:In sospeso,In corso,Completato',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date|after_or_equal:data_inizio',
        ]);
        $progetto = new progetto;
        $progetto->name = $validated['name'];
        $progetto->descrizione = $validated['descrizione'];
        $progetto->stato = $validated['stato'];
        $progetto->data_inizio = $validated['data_inizio'];
        $progetto->data_fine = $validated['data_fine'];
        $progetto->user_id = auth()->id();

        $progetto->save();

        return redirect()->route('progetti.show', $progetto)
        ->with('success', 'Progetto creato con successo.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(progetto $progetto)
    {
        // Controlla se l'utente corrente può visualizzare il progetto
        $this->authorize('view', $progetto);

        return view('progetti.show',compact('progetto'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(progetto $progetto)
    {
        return view('progetti.edit', compact('progetto'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, progetto $progetto)
    {
        // Controlla se l'utente corrente può aggiornare il progetto
        $this->authorize('update', $progetto);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'descrizione' => 'required',
            'stato' => 'required|in:In sospeso,In corso,Completato',
            'data_inizio' => 'required|date',
            'data_fine' => 'required|date|after_or_equal:data_inizio',
        ]);

        $progetto->name = $validated['name'];
        $progetto->descrizione = $validated['descrizione'];
        $progetto->stato = $validated['stato'];
        $progetto->data_inizio = $validated['data_inizio'];
        $progetto->data_fine = $validated['data_fine'];

        $progetto->save();

        return redirect()->route('progetti.show', $progetto)
            ->with('success', 'Progetto aggiornato con successo.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(progetto $progetto)
    {
        // Controlla se l'utente corrente può eliminare il progetto
        $this->authorize('delete', $progetto);

        $progetto->delete();

        return redirect()->route('progetti.index')
        ->with('success', 'Progetto eliminato con successo.');
        //
    }
}
