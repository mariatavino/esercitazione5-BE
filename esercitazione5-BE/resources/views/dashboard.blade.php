@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Navbar viene inclusa dal layout -->

        <!-- Titolo -->
        <h1 class="mb-4">Flexible project management software</h1>

        <!-- Descrizione del prodotto -->
        <p class="mb-4">Manage projects and tasks, collaborate with teammates, and get status reports with just one click. Unlimited users and projects.</p>

        <!-- Bottone 'Get Started' -->
        <a href="{{ route('progetti.index') }}" class="btn btn-primary mb-4">Get Started</a>

        <!-- Contatore degli utenti -->
        <p>{{ \App\Models\User::count() }} users manage tasks with Plaky</p>
    </div>
@endsection
