@extends('layouts.app')
@section('content')
<h1 class="text-center mt-5">Liste des articles</h1>
<div class="container">
    <a href="{{ route('articles.ajout') }}" class="btn btn-success">Ajouter</a>
</div>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Quantite</th>
        <th scope="col">Prix</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
      <tr>
        <td>{{$article->nom}}</td>
        <td>{{$article->quantite}}</td>
        <td>{{$article->prix}}</td>
        <td>
         <a href="#"> <button type="button" class="btn btn-warning">Modifier</button></a>
         <a href="#"> <button type="button" class="btn btn-danger">Supprimer</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
