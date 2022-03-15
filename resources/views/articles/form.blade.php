@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', isset($article->title) ? $article->title : '') }}">
    @error('title')
    <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ old('body', isset($article->body) ? $article->body : '') }}</textarea>
    @error('body')
    <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>