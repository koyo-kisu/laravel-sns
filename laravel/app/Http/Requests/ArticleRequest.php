<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// フォームリクエスト: 記事投稿画面や記事更新画面から送信された記事タイトルや記事本文のバリデーションなどを行います。
// *Controllerであまり多くの処理を持たせない方が良いとされるため分ける
class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // リクエストの対象となるリソース(ここでは記事)をユーザーが更新して良いかどうかを判定させます。
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    // バリデーションルール
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:500',
        ];
    }

    // バリデーションエラーメッセージに表示される項目名をカスタマイズ
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
        ];
    }
}
