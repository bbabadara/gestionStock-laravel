@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5">Liste des articles</h1>

    <!-- Button to add a new article -->
    <div class="container mb-4">
        <a href="{{ route('articles.ajout') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Ajouter un article
        </a>
    </div>

    <div class="container">
        <!-- Display the total number of articles -->
        <p class="text-muted">Total des articles : {{ $articles->total() }}</p>

        <!-- Articles Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->nom }}</td>
                            <td>{{ $article->quantite }}</td>
                            <td>{{ number_format($article->prix, 2) }} €</td> <!-- Format price with 2 decimals -->
                            <td class="d-flex">
                                <!-- Edit Button -->
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm me-2">
                                    <i class="bi bi-pencil"></i> Modifier
                                </a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-3">
          <nav aria-label="Page navigation">
              <ul class="pagination">
                  {{ $articles->links() }}
              </ul>
          </nav>
      </div>
      
    </div>

@endsection
