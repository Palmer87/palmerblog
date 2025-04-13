@extends('base')

@section('title', isset($post) ? 'Modifier l\'article' : 'Créer un article')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ isset($post) ? 'Modifier l\'article' : 'Créer un article' }}</h1>

    <form action="{{ isset($post) ? route('blog.update', ['post' => $post->id]) : route('blog.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title', $post->title ?? '') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                   id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control @error('content') is-invalid @enderror"
                      id="content" name="content" rows="5">{{ old('content', $post->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id ?? '') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @php
            $tagsid = isset($post) ? $post->tags()->pluck('id')->toArray() : [];
        @endphp
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tags', $tagsid)))>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" class="form-control"id="image" name="image" >
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($post) ? 'Mettre à jour' : 'Créer' }}
        </button>
    </form>
</div>
@endsection
