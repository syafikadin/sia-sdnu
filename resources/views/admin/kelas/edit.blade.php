@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit kelas</h1>
    </div>

    <div class="col-lg-6">
        <form method="kelas" action="/admin/kelas/{{ $kelas->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $kelas->title) }}">
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>   
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update kelas</button>
        </form>
    </div>
@endsection