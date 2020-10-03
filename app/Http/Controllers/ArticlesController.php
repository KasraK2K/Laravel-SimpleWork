<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Symfony\Component\Console\Input\Input;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(3);
        } else {
            $articles = Article::latest()->paginate(3);
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    protected function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required|min:10',
            'body' => 'required|min:10',
            'tags' => 'exists:tags,id'
        ]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());
        return redirect($article->path());
    }
}
