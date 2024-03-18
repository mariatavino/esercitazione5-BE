@extends('layouts.app')

@section('content')
<div class="intestazione">
    <h1>I Tuoi Progetti Attivi</h1>
    <a href="{{ route('progetti.create') }}" class="btn1">
        <i class="bi bi-plus-circle-fill"></i> Nuovo Progetto
    </a>
</div>

    <div class="container rounded border-2 p-0">
        <table id="myTable" class="table table-responsive table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th class="table-active">#</th>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Data Inizio</th>
                    <th>Data Fine</th>
                    <th>Stato</th>
                    <th>Operazioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($progetti as $progetto)
                    <tr>
                        <td class="table-active">{{ $progetto->id }}</td>
                        <td id="name">
                            <a href="{{ route('progetti.show', $progetto->id) }}">
                                {{ $progetto->name }}
                            </a>
                        </td>
                        <td id="desc">{{ $progetto->descrizione }}</td>
                        <td>{{ \Carbon\Carbon::parse($progetto->data_inizio)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($progetto->data_fine)->format('d-m-Y') }}</td>
                        <td>{{ $progetto->stato }}</td>
                        <td>
                            <div class="d-flex justify-between">
                                <a href="{{ route('progetti.edit', $progetto->id) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('progetti.destroy', $progetto->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .btn1{
            background: linear-gradient(to right, #6596f9, #1c68ff);
            padding: 0.2em 0.6em 0 0.6em;
            border-radius: 10px;
            margin-left: 5em;
            align-content: center;
        }
        .intestazione{
            display: flex;
            padding: 1em;
            font-size: large;
            font-size: bold;
            justify-content: space-between;
        }
        h1{
            font-size: 1.5rem;
            font-weight: 900;
        }
        #name{
            font-size: 1rem;
            width: 20vw;
        }
        #desc{
            font-size: 0.7rem;
            width: 35vw;
        }
        .container{
            max-width: 95vw; !important
        }
    </style>
@endsection
