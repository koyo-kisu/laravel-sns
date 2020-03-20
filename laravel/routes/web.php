<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 認証関連のルーティングのひな形を用意
Auth::routes();

// ルーティングに名前をつける
Route::get('/', 'ArticleController@index')->name('articles.index');

// リソースフルルート
// リソースに対するさまざまなアクションを処理する、複数のルートがこの１定義により生成
// 部分的なリソースルートでauthミドルウェアをつけないアクションに変更

// except()
// 記事一覧のURLが'/'と、'/articles'の両方存在するので@indexを除く

// middleware()
// リクエストをコントローラーで処理する前あるいは後のタイミングで何らかの処理を行う
// authミドルウェアは、リクエストをコントローラーで処理する前にユーザーがログイン済みであるかどうかをチェック
// ログインしていなければユーザーをログイン画面へリダイレクト
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');

Route::resource('/articles', 'ArticleController')->only(['show']);