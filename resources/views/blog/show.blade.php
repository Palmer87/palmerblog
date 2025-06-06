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
                <form action="{{ route('blog.destroy', ['post' => $post->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <span class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-2" viewBox="0 0 20 20" fill="currentColor" width="20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Supprimer
                        </span>
                    </button>
                </form>
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
                @if ($post->image)
                    <img src="{{ $post->imageUrl() }}" class="img-fluid mb-4 rounded" alt="{{ $post->title }}">
                @endif
                <div class="blog-post-content">
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </article>
@endsection

