@extends('welcome')

@section('content')
    <main>
        @include('components.navigation')
        <div class="container">

            <div Class="pt-4 pb-4 d-flex justify-content-left"><h1>{{ $post->post_title }}</h1></div>
            <div class="row d-flex">
                <div class="col-sm">
                    <p>
                        {{ $post->post_content }}
                    </p>
                </div>
            </div>
            <div class="p-3">
                @foreach($categories as $category)
                    <label class="form-check-label" for="category.{{ $category->id }}">
                        <span class="badge badge-pill bg-{{ $category->category_colour }}">{{ $category->category_name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

    </main>
@endsection
