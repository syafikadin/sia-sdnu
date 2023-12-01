@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-5 mt-5 ms-5">
                <a href="/admin/guru" class="btn btn-success">
                    <i class="fa-solid fa-backward-step"></i> Back to All guru
                </a>
                <form action="/admin/guru/{{ $guru->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apa anda yakin menghapus data ini?')">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="row my-3 mt-4">
            <div class="col-lg-2 ms-5 mt-2">

                <div class="div" style="width: 150px; height: 250px; background-color: teal">

                </div>
            </div>
            <div class="col-lg-8 ms-4">
                <h2 class="mb-4">{{ $guru->nama_guru }} {{ $guru->gelar }}</h2>
                <p>NIP : {{ $guru->nip }}</p>
                <p>Jenis Kelamin : {{ $guru->jenis_kelamin == 0 ? 'Laki - Laki' : 'Perempuan' }}</p>
                <p>Tanggal Lahir : {{ $guru->tanggal_lahir }}</p>
                <p>Alamat : {{ $guru->alamat }}</p>
            </div>
        </div>
    </div>
@endsection
