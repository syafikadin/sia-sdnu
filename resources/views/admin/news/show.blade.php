@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-10">
                <h2>{{ $news->news }}</h2>


                <a href="/admin/news" class="btn btn-success"><span data-feather="corner-up-left"
                        class="align-text-bottom"></span> Kembali ke Data Berita</a>


                <form action="/admin/news/{{ $news->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">
                        <span data-feather="trash-2" class="align-text-bottom"></span> Delete
                    </button>
                </form>

                @if ($news->image)
                    <div style="max-width: 1200px; max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->news }}" class="img-fluid mt-3">
                    </div>
                @else
                    <p>Tidak ada gambar</p>
                @endif

                <article class="my-3">
                    {!! $news->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
