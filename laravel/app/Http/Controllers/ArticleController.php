<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
			// sortByDescメソッド（コレクション）を使いcreated_atの降順で並び替え
			$articles = Article::all()->sortByDesc('created_at');

			// ビュー変数articlesをarticles.indexファイルに渡す
			return view('articles.index', ['articles' => $articles]);
		}
		
		public function create() {
			return view('articles.create');
		}

		// 引数$requestはArticleRequestクラスのインスタンスである、ということを宣言

		// DI(Dependency Injection)
		// 外で生成されたクラスのインスタンスをメソッドの引数として受け取る
		// ArticleControllerがArticleクラスへ依存している度合いを下げ、今後の変更がしやすい、テストがしやすい設計となります
		public function store(ArticleRequest $request, Article $article) {
			$article->title = $request->title;
			$article->body = $request->body;

			// ユーザーのidを取得し、これもArticleモデルのインスタンスのuser_idプロパティに代入
			$article->user_id = $request->user()->id;
			$article->save();
			return redirect()->route('articles.index');
		}
}
