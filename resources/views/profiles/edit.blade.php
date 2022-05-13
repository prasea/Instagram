@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-8 offset-2">
        <div class="row">
          <h1>Edit Profile</h1>
        </div>
        <div class="row mb-3">
          <label for="title" class="col-md-4 col-form-label">Title</label>
          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="row mb-3">
          <label for="description" class="col-md-4 col-form-label">About you</label>
          <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>
          @error('description')
          <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="row mb-3">
          <label for="url" class="col-md-4 col-form-label">URL</label>
          <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

          @error('url')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="row mb-3">
          <label for="image" class="col-md-4 col-form-label">Profile Image</label>
          <input type="file" name="image" id="image">
          @error('image')
          <strong>{{ $message }}</strong>
          @enderror
        </div>

        <div class="row mb-3">
          <button class="btn btn-primary">Save profile</button>
        </div>
      </div>
    </div>

  </form>
</div>
@endsection