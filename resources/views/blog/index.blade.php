@extends('base')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Liste des articles</h1>

    @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="small">
                                @if ($post->category)
                                Categorie:<strong>{{$post->category?->name}}</strong>
                                 @endif
                                 @if (!$post->tags->isEmpty())
                                 Tags:
                                 @foreach ($post->tags as $tag )
                                 <span class="badge bg-secondary">{{$tag->name}}</span>

                                 @endforeach

                                 @endif

                            </p>
                            @if ($post->image)
                            <img src="{{ $post->imageUrl() }}" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">

                            @endif
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('blog.show', ['post' => $post->id, 'slug' => $post->slug]) }}" class="btn btn-primary">
                                Lire la suite
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Bootstrap -->
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    @else
        <p class="text-center text-muted">Aucun article disponible.</p>
    @endif
</div>
@endsection
