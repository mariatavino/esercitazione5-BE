@extends('layouts.app')

@section('content')
    <h1>Nuova Attività</h1>

    <form action="{{ route('attivita.store') }}" method="POST">
        @csrf

        <!-- Qui inserisci i campi del modulo per la creazione di una nuova attività -->

        <button type="submit">Crea Attività</button>
    </form>
@endsection
