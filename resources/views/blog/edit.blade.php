@extends('base')

@section('content')
    @include('blog.form', ['post' => $post, 'categories' => $categories, 'tags' => $tags])
@endsection
