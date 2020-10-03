<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(3);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        return view('articles.show', ['article' => Article::findOrFail($id)]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        request()->validate([
            'title'     => 'required|min:3|max:255',
            'excerpt'   => 'required|min:10',
            'body'      => 'required|min:10',
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {
        request()->validate([
            'title'     => 'required|min:3|max:255',
            'excerpt'   => 'required|min:10',
            'body'      => 'required|min:10',
        ]);

        $article = Article::findOrFail($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $id);
    }
}
