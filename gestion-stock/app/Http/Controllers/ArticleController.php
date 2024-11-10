<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Affiche la liste de tous les articles
    public function index()
    {
        $articles = Article::paginate(3);
        return view('articles.liste', compact('articles'));
    }

    // Affiche le formulaire pour ajouter un nouvel article
    public function ajout()
    {
        return view('articles.ajout');
    }

    // Enregistre un nouvel article dans la base de données
    public function store(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'nom' => "required|max:255",
            'prix' => "required|numeric|min:0",  // Prix doit être un nombre positif
            'quantite' => "required|numeric|min:0",  // Quantité doit être un nombre positif
        ]);
    
        // Vérification si le prix ou la quantité est négatif
        if ($request->prix < 0 || $request->quantite < 0) {
            return redirect()->route('articles.ajout')
                ->withErrors([
                    'prix' => 'Le prix doit être une valeur positive.',
                    'quantite' => 'La quantité doit être une valeur positive.',
                ]);
        }
    
        // Création de l'article dans la base de données
        Article::create($request->all());
    
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');
    }

    // Affiche le formulaire pour éditer un article
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Met à jour les informations d'un article existant
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => "required|max:255",
            'prix' => "required|max:255",
            'quantite' => "required|max:255"
        ]);

        $article->update($request->all());
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

    // Supprime un article de la base de données
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }

    
}

