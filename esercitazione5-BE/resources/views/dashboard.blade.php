@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Titolo -->
        <h1 class="text-white">Flexible project management software</h1>

        <!-- Descrizione del prodotto -->
        <p class="text-secondary">Manage projects and tasks, collaborate with teammates, and get status reports with just one click. Unlimited users and projects.</p>

        <!-- Bottone 'Get Started' -->
        <a href="{{ route('progetti.index') }}" class="btn gradient-button">Get Started <i class="bi bi-arrow-right-circle-fill"></i></a>

        <!-- Contatore degli utenti -->
        <p class="text-primary small mt-1"><i class="bi bi-people-fill"></i> {{ \App\Models\User::count() }} users manage tasks with Plaky</p>
    </div>

    <style>
        .gradient-button {

            background: linear-gradient(to right, #6596f9, #1c68ff);
            color: white;
            padding: 0.5em 2em;
            border-radius: 10px;
            font-weight: bolder;
            font-size: 1.7rem;
        }
        .text-secondary {
            color: #9090AD !important;
            margin: 1em 0 2em;
        }
        .text-primary {
            color: #307CFF !important;
            font-size: small;
        }
        .container{
            position: absolute;
            top: 25%;
            left: 20%;
            width: 60vw;
            height: 75%;
            font-size: 1.35em;
            line-height: 2.3rem;
            text-align: center;
        }
        h1{
            font-size: 2.5em;
            font-weight: 900;
            line-height: 4rem;
        }
        i{
            font-size: 1.5rem;
            margin-left: 0.2em;
        }
        .bi-people-fill{
            font-size: 1.1rem;
            margin: 0em;
        }
    </style>
@endsection
