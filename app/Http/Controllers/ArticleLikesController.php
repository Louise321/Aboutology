<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleLikesController extends Controller
{
    public function store(Article $article)
    {
        $article->like(auth()->user());

        return back();
    }

    public function destroy(Article $article)
    {
        $article->dislike(auth()->user());

        return back();
    }
}
