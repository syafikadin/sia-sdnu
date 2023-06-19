@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kelas</h1>
    </div>

    <div class="col-lg-6">
        <form method="kelas" action="/admin/kelas/{{ $kela->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
              <label for="nama_kelas" class="form-label">Nama Kelas</label>
              <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" required autofocus value="{{ $kela->nama_kelas }}">
              @error('nama_kelas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>   
              @enderror
            </div>

            <select class="form-select mb-3" aria-label="Default select example" name="guru_id">
                @foreach ($gurus as $guru)
                    @if ($kela->guru->id == $guru->id)
                        <option value="{{ $guru->id }}" selected>{{ $guru->nama_guru }}</option>
                    @else
                        <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                    @endif
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Update Kelas</button>
        </form>
    </div>
@endsection