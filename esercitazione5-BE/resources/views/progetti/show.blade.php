@extends('layouts.app')

@section('content')
    <h1>{{ $progetto->name }}</h1>

    <p>Descrizione: {{ $progetto->descrizione }}</p>
    <p>Stato: {{ $progetto->stato }}</p>
    <p>Data Inizio: {{ $progetto->data_inizio }}</p>
    <p>Data Fine: {{ $progetto->data_fine }}</p>

    <a href="{{ route('progetti.edit', $progetto) }}">Modifica Progetto</a>

    <form action="{{ route('progetti.destroy', $progetto) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Elimina Progetto</button>
    </form>
@endsection
