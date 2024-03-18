@extends('layouts.app')

@section('content')
    <h1>{{ $attivita->name }}</h1>
    <p>{{ $attivita->descrizione }}</p>

    <a href="{{ route('attivita.edit', $attivita) }}">Modifica</a>

    <form action="{{ route('attivita.destroy', $attivita) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Elimina</button>
    </form>
@endsection
