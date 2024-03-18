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

    <!-- Mostra le attività del progetto -->
    <h2 class="my-3">Attività</h2>
    <div class="row row-cols-1 row-cols-md-4"> <!-- Crea un sistema di griglia con 4 card per riga su schermi di dimensioni medie e superiori -->
        @foreach ($progetto->attivitas as $attivita)
            <div class="col d-flex"> <!-- Ogni attività viene inserita in una colonna e diventa un elemento flex -->
                <div class="card mb-3 bg-dark text-white flex-fill"> <!-- La card si espande per riempire lo spazio disponibile nella colonna -->
                    <div class="card-body">
                        <h5 class="card-title font-bold text-xl">{{ $attivita->name }}</h5>
                        <p class="card-text text-sm">{{ $attivita->descrizione }}</p>
                        <p class="card-text my-1">Stato: {{ $attivita->stato }}</p>
                        <p class="card-text">Data Scadenza: {{ $attivita->data_scadenza }}</p>

                        <div class="container d-flex justify-center">
                            <a href="{{ route('attivita.edit', $attivita->id) }}" class="btn btn-primary mt-3 me-4"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('attivita.destroy', $attivita->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-3"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        </div>
                    </div> <!-- Chiudi card-body -->
                </div> <!-- Chiudi card -->
            </div> <!-- Chiudi colonna -->
        @endforeach
        <div class="col d-flex">
            <div class="card mb-3 bg-dark text-white d-flex align-items-center justify-content-center flex-fill" style="height: 60vh;" id="addTaskCard">
                <i id="aggiungiAtt" class="bi bi-plus-circle-dotted text-white" onclick="showForm()"></i>
                <p id="addTaskText" class="text-white">Aggiungi Attività</p>
            </div>
            <div class="card mb-3 bg-dark text-white flex-fill" id="addTaskForm" style="display: none; height: 60vh;">
                <div class="card-body">
                    <form action="{{ route('attivita.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <div class="mb-3">
                            <input type="hidden" id="progetto_id" name="progetto_id" value="{{ $progetto->id }}">
                            <input type="text" class="form-control custom-input" id="name" name="name" placeholder="Nome" required>
                            <textarea class="form-control custom-input" id="descrizione" name="descrizione" rows="3" placeholder="Descrizione" required></textarea>
                            <select class="form-control custom-input" id="stato" name="stato" required>
                                <option value="In sospeso">In sospeso</option>
                                <option value="In corso">In corso</option>
                                <option value="Completato">Completato</option>
                            </select>
                            <input type="date" class="form-control custom-input" id="data_scadenza" name="data_scadenza" placeholder="Data Scadenza" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i></button>
                        <button type="button" class="btn btn-secondary" onclick="cancelForm()"><i class="bi bi-x-circle"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <script>
        function showForm() {
            document.getElementById("addTaskCard").style.display = "none";
            document.getElementById("addTaskForm").style.display = "block";
        }

        function cancelForm() {
            document.getElementById("addTaskForm").style.display = "none";
            document.getElementById("addTaskCard").style.display = "block";
        }
        </script>

        <style>
            #aggiungiAtt{
                font-size: 3.5em;
            }
            .custom-input {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid gray;
        border-radius: 0;
        color: white;
    }
    .custom-input::placeholder {
        color: white;
    }
    .custom-input:focus {
        box-shadow: none;
        border-color: white;
    }
        </style>
        @endsection
