@extends('layouts.app')

@section('content')
<h1 class="text-center mt-5">Modifier l'article</h1>

<div class="container">
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Indique que c'est une requête PUT -->

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $article->nom }}" required>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $article->quantite }}" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ $article->prix }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>

@endsection
