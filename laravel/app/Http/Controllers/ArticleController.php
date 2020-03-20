<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
			// sortByDescメソッド（コレクション）を使いcreated_atの降順で並び替え
			$articles = Article::all()->sortByDesc('created_at');

			// ビュー変数articlesをarticles.indexファイルに渡す
			return view('articles.index', ['articles' => $articles]);
    }
}
