<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('articles.liste', compact('articles'));
    }

    public function ajout()
    {
        return view('articles.ajout');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nom' => "required|max:255",
            'prix' => "required|max:255",
            'quantite' => "required|max:255"
        ]);

        Article::create($request->all());
        return redirect()->route('articles.liste')->with('success','Contact créé avec succés');
    }
}
