@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un article</h2>

    <!-- Affichage des messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire pour ajouter un article -->
    <form action="{{ route('articles.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="nom">Nom de l'article</label>
            <input type="text" name="nom" placeholder="Nom de l'article" required class="form-control @error('nom') is-invalid @enderror" />
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="prix">Prix</label>
            <input type="text" name="prix" placeholder="Prix" required class="form-control @error('prix') is-invalid @enderror" />
            @error('prix')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="quantite">Quantité</label>
            <input type="text" name="quantite" placeholder="Quantité" required class="form-control @error('quantite') is-invalid @enderror" />
            @error('quantite')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

@endsection