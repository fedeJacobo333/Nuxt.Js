<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('title', 'ASC')->with(['user'])->get();
        return $articles;
    }

    public function store(Request $request)
    {
        $attributes = $this->validateArticle();
        $attributes['date'] = now();
        $attributes['user_id'] = request('userId');
        Article::create($attributes);
    }

    public function update(Request $request, Article $article)
    {
        if($article->user_id !== $request->user()->id) {
            return response('Unauthorized', 403);
        }
        $article->update($this->validateArticle());
    }

    public function destroy(Request $request, Article $article)
    {
        if($article->user_id !== $request->user()->id) {
            return response('Unauthorized', 403);
        }
        $article->delete();
    }

    public function validateArticle(): array
    {
        return request()->validate(['title' => 'required|string',
            'description' => 'required|string']);
    }
}
