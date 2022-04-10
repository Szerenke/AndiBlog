@extends('welcome')

@section('content')

<main>
    @include('components.navigation')
    <div class="container">
        <div class="pt-4 pb-4 d-flex justify-content-center"><h1>{{ __('Új cikk') }}</h1></div>
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            @include('components.post-form')
            <div class="form-group">
                <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Kategóriák') }}</label>
                <select class="form-control post-categories" multiple="multiple" name="categories[]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $category_id) === $category->id  ? 'selected' : '' }}>{{ $category->category_name }}</option>
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
