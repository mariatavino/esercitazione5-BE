@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Crea un nuovo progetto</h1>

    <form action="{{ route('progetti.store') }}" method="POST" class="form-control bg-dark text-white">
        @csrf

        <div class="form-group">
            <label for="name">Nome Progetto:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="stato">Stato:</label>
            <select id="stato" name="stato" class="form-control" required>
                <option value="">-- Seleziona lo stato --</option>
                <option value="In sospeso">In sospeso</option>
                <option value="In corso">In corso</option>
                <option value="Completato">Completato</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inizio">Data Inizio:</label>
            <input type="date" id="data_inizio" name="data_inizio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_fine">Data Fine:</label>
            <input type="date" id="data_fine" name="data_fine" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crea Progetto</button>
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
    <style>
        h1{
            font-size: 1.5rem;
            font-weight: 900;
        }

    </style>
@endsection
