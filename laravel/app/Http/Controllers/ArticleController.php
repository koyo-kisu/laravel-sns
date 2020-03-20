<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
		// インスタンスが生成された時に初期処理として特に呼び出さなくても必ず実行される
		// authorizeResource()
		// 第一引数には、モデルのクラス名を渡します
		// 第二引数には、そのモデルのIDがセットされる、ルーティングのパラメータ名を渡します
		public function __construct() {
			$this->authorizeResource(Article::class, 'article');
		}

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

		// ArticleモデルのインスタンスのDI
		public function edit(Article $article) {
			// ビューには'article'というキー名で、変数$articleの値(Articleモデルのインスタンス)を渡しています
			return view('articles.edit', ['article' => $article]);
		}

    public function update(ArticleRequest $request, Article $article) {
      $article->fill($request->all())->save();
  	  return redirect()->route('articles.index');
		}
		
		public function destroy(Article $article) {
			$article->delete();
			return redirect()->route('articles.index');
		}

		public function show(Article $article) {
			return view('articles.show', ['article' => $article]);
		}
}
