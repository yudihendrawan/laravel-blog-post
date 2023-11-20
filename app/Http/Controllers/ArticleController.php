<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon; 


class ArticleController extends Controller
{
    public function index()
    {
        $title = '';
        $article_by_date = null;
        $created_at = new \DateTime();
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        if (request('created_at')) {

            $selectedDate = request('created_at');
            $created_at = Article::whereDate('created_at', '=', $selectedDate)->get();
            $article_by_date = $created_at;
            $title = ' in ' . $selectedDate;
        }
        
        return view('articles', [
            "title" => "All articles" . $title,
            "active" => 'articles',
            'article_by_date' => $article_by_date,
            "articles" => Article::latest()->filter(request(['search', 'category', 'author', 'created_at']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Article $article)
    {
        return view('article', [
            "title" => "Single Article",
            "active" => 'articles',
            "article" => $article
        ]);
    }
}