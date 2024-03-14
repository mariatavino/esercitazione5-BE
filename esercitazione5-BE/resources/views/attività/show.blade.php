@extends('layouts.app')

@section('content')
    <h1>{{ $attività->name }}</h1>
    <p>{{ $attività->descrizione }}</p>

    <a href="{{ route('attività.edit', $attività) }}">Modifica</a>

    <form action="{{ route('attività.destroy', $attività) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Elimina</button>
    </form>
@endsection
