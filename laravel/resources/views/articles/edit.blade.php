@extends('app')

@section('title', '記事更新')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <!-- 記事更新処理へのURLを指定 -->
              <!-- route関数の第二引数には、連想配列形式でルーティングのパラメーターを渡す -->
              <!-- 
                記事更新処理のURLはarticles/{article}
                {article}に、route関数の第二引数の連想配列のarticleをキーとする値、つまり$articleの値が入ります。
               -->
              <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                @method('PATCH')
                @include('articles.form')
                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection