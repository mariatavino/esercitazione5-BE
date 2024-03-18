@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-3 text-xl">{{ $progetto->name }}</h1>
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h5 class="card-title">Descrizione:</h5>
            <p class="card-text mb-3">{{ $progetto->descrizione }}</p>

            <h5 class="card-title">Stato: {{ $progetto->stato }}</h5>

            <h5 class="card-title">Data Inizio: {{ $progetto->data_inizio }}</h5>

            <h5 class="card-title">Data Fine: {{ $progetto->data_fine }}</h5>

            <div class="container d-flex">
                <a href="{{ route('progetti.edit', $progetto->id) }}" class="btn btn-primary mt-3 me-4">Modifica Progetto</a>

            <form action="{{ route('progetti.destroy', $progetto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Elimina Progetto</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
