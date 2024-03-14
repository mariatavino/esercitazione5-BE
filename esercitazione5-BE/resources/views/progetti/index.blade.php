@extends('layouts.app')

@section('content')
    <h1>Elenco Progetti</h1>
    @foreach ($progetti as $progetto)
        <div>
            <h2>{{ $progetto->name }}</h2>
            <p>{{ $progetto->descrizione }}</p>
            <!-- Qui potresti aggiungere il codice per visualizzare altre informazioni sul progetto -->
        </div>
    @endforeach
@endsection
