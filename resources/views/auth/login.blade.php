@extends('base')

@section('content')
<h1>se connecter</h1>
<form action="{{ route('login') }}" method="POST" class="vstack gap-3">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control  @error('password') is-invalid @enderror"
               id="password" name="password" >
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">
        se connecter
    </button>

</form>

@endsection
