@extends('welcome')

@section('content')

<main>
    @include('components.navigation')
    <div class="container">
        <div class="pt-4 pb-4 d-flex justify-content-center"><h1>{{ __('Cikk szerkesztése') }}</h1></div>
        <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @include('components.post-form')
            <div class="form-group">
                <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Kategóriák') }}</label>
                <select class="form-control post-categories" multiple="multiple" name="categories[]">
                    @foreach($categories as $category)

                        @if($post_categories->contains($category->id))
                            <option value="{{ $category->id }}" {{ old('category_id', $category->id) ===  $category->id  ? 'selected' : '' }} selected="selected">{{ $category->category_name }}</option>
                        @else
                            <option value="{{ $category->id }}" {{ old('category_id', $category_id) ===  $category->id  ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            @include('components.edit-footer')
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(".post-categories").select2({
            tags: true
        });
    });
</script>

@endsection
