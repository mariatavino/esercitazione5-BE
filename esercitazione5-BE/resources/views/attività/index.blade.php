@extends('layouts.app')

@section('content')
    <h1>Elenco Attività</h1>

    @foreach($attivitàs as $attività)
        <div>
            <h2>{{ $attività->name }}</h2>
            <p>{{ $attività->descrizione }}</p>
            <a href="{{ route('attività.show', $attività) }}">Visualizza dettagli</a>
        </div>
    @endforeach
@endsection
