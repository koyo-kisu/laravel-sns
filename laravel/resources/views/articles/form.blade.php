@csrf
<div class="md-form">
  <label>タイトル</label>
  <!-- 
    Null合体演算子 式1 ?? 式2
    式1がnullでない場合は、式1が結果となる
    式1がnullである場合は、式2が結果となる
   -->
  <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>