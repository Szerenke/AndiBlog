@extends('welcome')

@section('content')

    @livewire('posts-search', ['posts' => $posts, 'categories' => $categories])

@endsection
