@extends('layouts.main')

@section('container')
<h1 class="mb-4 text-center">{{ $title }}</h1>

<div class="row justify-content-center">
  <div class="col-md-6">
    <form action="/data_berita">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($data_berita->count())
  <div class="card mb-3 text-center">
    @if ($data_berita[0]->image)
      <div style="max-width: 1200px; max-height: 400px; overflow: hidden;">
          <img src="{{ asset('storage/' . $data_berita[0]->image) }}" alt="image" class="img-fluid">
      </div>
    @else
      {{-- <img src="https://source.unsplash.com/1200x400?{{ $data_berita[0]->category->name }}" class="card-img-top" alt="{{ $data_berita[0]->category->name }}"> --}}
    @endif
    <div class="card-body">
      <h3 class="card-title"><a href="/data_berita/{{ $data_berita[0]->id}}" class="text-decoration-none text-dark">{{ $data_berita[0]->title }}</a></h3>
      <p>
        <small class="text-muted">
          {{-- By : <a href="/data_berita?users={{ $data_berita[0]->user->username }}" class="text-decoration-none">{{ $data_berita[0]->user->name }}</a> - <a href="/data_berita?category={{ $data_berita[0]->category->slug }}" class="text-decoration-none">{{ $data_berita[0]->category->name }}</a> --}}
          {{ $data_berita[0]->created_at->diffForHumans() }}
        </small>
      </p> 
      <p class="card-text">{{ $data_berita[0]->body }}</p>
      <a href="/berita/{{ $data_berita[0]->id }}" class="text-decoration-none btn btn-primary">Read More</a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($data_berita->skip(1) as $berita)
      <div class="col-md-4 mb-3">
        <div class="card">
            @if($berita->image)
              <img src="{{ asset('storage/' . $berita->image) }}" alt="image" class="img-fluid">
            @else
              {{-- <img src="https://source.unsplash.com/400x300?{{ $berita->category->name }}" class="card-img-top" alt=""> --}}
            @endif
          <div class="card-body">
            <h5 class="card-title"><a href="/berita/{{ $berita->id }}" class="text-decoration-none">{{ $berita->title }}</a></h5>
            {{-- <p>By : <a href="/data_berita?users={{ $berita->user->username }}" class="text-decoration-none">{{ $berita->user->name }}</a> - {{ $data_berita[0]->created_at->diffForHumans() }}</p> --}}
            <p>{!! Str::limit($berita->body, 50) !!}</p>
            <a href="/berita/{{ $berita->id }}" class="text-decoration-none btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

@else
  <p class="text-center fs-4">No berita Found</p>
@endif

<div class="d-flex justify-content-center">
  {{-- {{ $data_berita->links() }} --}}
</div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br>
  @include('partials.footer')
@endsection