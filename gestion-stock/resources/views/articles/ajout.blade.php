@extends('layouts.app')
@section('content')


<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un article </h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nom de l'artilce</label>
            <input type="text" name="nom" placeholder="Nom de l'artilce" required class="form-control" />
        </div>
        <div class="form-group mb-3">
            <label for="name">Prix</label>
            <input type="text" name="prix" placeholder="prix" required class="form-control" />
        </div>
        <div class="form-group mb-3">
            <label for="name">Quantite</label>
            <input type="text" name="quantite" placeholder="quantite" required class="form-control" />
        </div>
        
      
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

@endsection
