<!-- 'app.blade.php'をベースとして使用することを宣言 -->
@extends('app')

<!-- yield('title')に文字列'記事一覧'が渡される -->
@section('title', '記事一覧')

<!-- yield('content')に渡される -->
@section('content')
  <!-- 'nav'が渡される -->
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection