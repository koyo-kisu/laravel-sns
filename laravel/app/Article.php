<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    // Eloquent: データベースとモデルを関連付ける機能
    // userメソッドの戻り値が、BelongsToクラスであることを宣言（型宣言）
    
    // ArticleインスタンスのbelongsToプロパティを参照
    // belongsToメソッドの引数には関係するモデルの名前を文字列で渡します
    // 記事と、記事を書いたユーザーは多対1の関係
    // そのような関係性の場合には、belongsToメソッドを使います
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['title', 'body'];
}
