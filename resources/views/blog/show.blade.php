@extends('base')
@section('title', $post->title)

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h2 mb-0">{{ $post->title }}</h1>

            <div class="d-flex gap-2">
                <a href="{{ route('blog.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary">
                    <span class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 20 20" fill="currentColor" width="20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Modifier
                    </span>
                </a>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                    <span class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 20 20" fill="currentColor" width="20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Retour
                    </span>
                </a>
            </div>

    </div>    <article class="blog-post">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="blog-post-content">
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </article>
@endsection

