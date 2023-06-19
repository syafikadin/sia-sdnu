@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Mapel</h1>
    </div>

    <div class="col-lg-6">
        <form method="mapel" action="/admin/mapel/{{ $mapel->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
              <label for="nama_mapel" class="form-label">Nama mapel</label>
              <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel" name="nama_mapel" required autofocus value="{{ $mapel->nama_mapel }}">
              @error('nama_mapel')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>   
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update mapel</button>
        </form>
    </div>
@endsection