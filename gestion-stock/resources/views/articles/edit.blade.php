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

        <!-- Nom de l'article -->
        <div class="form-group mb-3">
            <label for="nom">Nom de l'article</label>
            <input type="text" name="nom" placeholder="Nom de l'article" required class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" />
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Prix -->
        <div class="form-group mb-3">
            <label for="prix">Prix</label>
            <input type="text" name="prix" placeholder="Prix" required class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}" />
            @error('prix')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Quantité -->
        <div class="form-group mb-3">
            <label for="quantite">Quantité</label>
            <input type="text" name="quantite" placeholder="Quantité" required class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite') }}" />
            @error('quantite')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

@endsection