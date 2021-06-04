<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('title', 'ASC')->paginate(20);
        return $articles;
    }

    public function store(Request $request)
    {
        //$request->user()->id; agregarle al art el u-id
        Article::create($this->validateArticle());
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
            'description' => 'required|text'],
            $messages = [
                'title.required' => 'Se debe ingresar un título para el artículo',
                'description.required' => 'Se debe ingresar una descripción para el artículo',
            ]);
    }
}
