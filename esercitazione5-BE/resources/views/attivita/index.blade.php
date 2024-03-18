@extends('layouts.app')

@section('content')
    <h1>Elenco Attività</h1>

    @foreach($attivitas as $attivita)
        <div>
            <h2>{{ $attivita->name }}</h2>
            <p>{{ $attivita->descrizione }}</p>
            <a href="{{ route('attivita.show', $attivita) }}">Visualizza dettagli</a>
        </div>
    @endforeach
@endsection
