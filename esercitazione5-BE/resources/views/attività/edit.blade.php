@extends('layouts.app')

@section('content')
    <h1>Modifica Attività</h1>

    <form action="{{ route('attività.update', $attività) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Qui inserisci i campi del modulo per la modifica di un'attività -->

        <button type="submit">Salva modifiche</button>
    </form>
@endsection
