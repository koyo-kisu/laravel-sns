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
      <div class="card mt-3">
        <div class="card-body d-flex flex-row">
          <i class="fas fa-user-circle fa-3x mr-1"></i>
          <div>
            <div class="font-weight-bold">
            {{ $article->user->name }}
            </div>
            <div class="font-weight-lighter">
            <!-- format(): 日付表示フォーマット -->
            {{ $article->created_at->format('Y/m/d H:i') }}
            </div>
          </div>
        </div>
        <div class="card-body pt-0 pb-2">
          <h3 class="h4 card-title">
          {{ $article->title }}
          </h3>
          <div class="card-text">
          {!! nl2br(e( $article->body )) !!}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection