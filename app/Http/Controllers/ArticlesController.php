<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(3);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }
}
