@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Siswa</h1>
    </div>

    <div class="col-lg-6">
        <form method="post" action="/admin/siswa" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" required autofocus value="{{ old('nis') }}">
                @error('nis')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required autofocus value="{{ old('kelas') }}">
                @error('kelas')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required autofocus value="{{ old('jenis_kelamin') }}">
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required autofocus value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
                @error('alamat')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>   
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-primary">Buat Siswa</button>
        </form>
    </div>
@endsection