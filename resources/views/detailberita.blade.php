@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $berita -> title }}</h2>

                <p>{{ $berita->created_at->diffForHumans() }}</p>         
                
                @if ($berita->image)
                    <div style="max-width: 1200px; max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="image" class="img-fluid mt-3">
                    </div>
                @endif
                
                <article class="my-3">
                    {!! $berita -> body !!}
                </article>
                <a href="/berita">Kembali ke halaman utama</a>
            </div>
        </div>
    </div>
    
@endsection