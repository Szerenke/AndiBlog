<div class="form-group">
    <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Cím') }}</label>
    <input id="post_title" type="text" class="form-control rounded @error('post_title') is-invalid @enderror" name="post_title" value="{{ $post->post_title ?? old('post_title') }}"autocomplete="post_title" autofocus>

    @error('post_title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
<label for="post_content" class="col-md-4 col-form-label text-md-right">{{ __('Szöveg') }}</label>
    <textarea id="post_content" type="text" class="form-control rounded @error('post_content') is-invalid @enderror" name="post_content" autocomplete="post_content">
        {{ $post->post_content ?? old('post_content') }}
    </textarea>

    @error('post_content')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

