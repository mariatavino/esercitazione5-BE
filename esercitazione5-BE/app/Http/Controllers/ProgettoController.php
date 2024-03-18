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
            'name' => 'required|max:100',
            'descrizione' => 'required|max:500',
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
        if (auth()->check()) {
            $progetto->user_id = auth()->id();
        } else {
            return redirect('login');
        }


        $progetto->save();

        return redirect()->route('progetti.show', $progetto)
        ->with('success', 'Progetto creato con successo.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $progetto = Progetto::with('attivitas')->find($id); // Carica le attività

        if ($progetto === null) {
            return view('progetti.index');
        }

        return view('progetti.show', ['progetto' => $progetto]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $progetto = Progetto::find($id);

        if ($progetto === null) {
            return view('progetti.index');
        }

        return view('progetti.edit', compact('progetto'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $progetto = Progetto::findOrFail($id);

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
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $progetto = Progetto::findOrFail($id);

    // Controlla se l'utente corrente può eliminare il progetto
    $this->authorize('delete', $progetto);

    $progetto->delete();

    return redirect()->route('progetti.index')
        ->with('success', 'Progetto eliminato con successo.');
}
}
