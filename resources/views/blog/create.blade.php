@extends('base')

@section('content')
    @include('blog.form', ['categories' => $categories, 'tags' => $tags])
@endsection
