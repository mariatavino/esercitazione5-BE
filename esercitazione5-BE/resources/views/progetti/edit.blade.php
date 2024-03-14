@extends('layouts.app')

@section('content')
    <h1>Modifica Progetto: {{ $progetto->name }}</h1>

    <form action="{{ route('progetti.update', $progetto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome Progetto:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $progetto->name }}" required>
        </div>

        <div class="form-group">
            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione" class="form-control" required>{{ $progetto->descrizione }}</textarea>
        </div>

        <div class="form-group">
            <label for="stato">Stato:</label>
            <select id="stato" name="stato" class="form-control" required>
                <option value="">-- Seleziona lo stato --</option>
                <option value="In sospeso" {{ $progetto->stato == 'In sospeso' ? 'selected' : '' }}>In sospeso</option>
                <option value="In corso" {{ $progetto->stato == 'In corso' ? 'selected' : '' }}>In corso</option>
                <option value="Completato" {{ $progetto->stato == 'Completato' ? 'selected' : '' }}>Completato</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inizio">Data Inizio:</label>
            <input type="date" id="data_inizio" name="data_inizio" class="form-control" value="{{ $progetto->data_inizio->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="data_fine">Data Fine:</label>
            <input type="date" id="data_fine" name="data_fine" class="form-control" value="{{ $progetto->data_fine ? $progetto->data_fine->format('Y-m-d') : '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna Progetto</button>
    </form>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display flash messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
