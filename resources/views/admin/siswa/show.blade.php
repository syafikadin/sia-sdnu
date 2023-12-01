@extends('admin.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-5 mt-5 ms-5">
                <a href="/admin/siswa" class="btn btn-success">
                    <i class="fa-solid fa-backward-step"></i> Back to All siswa
                </a>
                <form action="/admin/siswa/{{ $siswa->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">
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
                <h2 class="mb-4">{{ $siswa->nama_siswa }}</h2>
                <p>NIS : {{ $siswa->nis }}</p>
                <p>Kelas : {{ $siswa->kelas ? $siswa->kelas->nama_kelas : 'Siswa Belum Masuk Kelas' }}</p>
                <p>Jenis Kelamin : {{ $siswa->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</p>
                <p>Tanggal Lahir : {{ $siswa->tanggal_lahir }}</p>
                <p>Alamat : {{ $siswa->alamat }}</p>
            </div>
        </div>
    </div>
@endsection
