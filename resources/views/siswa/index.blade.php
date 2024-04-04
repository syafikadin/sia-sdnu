@extends('siswa.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halo Siswa, {{ auth()->user()->siswa->nama_siswa }}</h1>
    </div>

    <div class="row">
        <div class="col-4 col-sm-6 col-md-4">
            <div class="card mb-3 shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-chalkboard-user fa-2x py-2" style="color: #1CB78D"></i>
                    <h5 class="card-title">Kelas saat ini</h5>
                    <p class="card-text">{{ $kelas->nama_kelas }}</p>
                </div>
            </div>
        </div>
        <div class="col-4 col-sm-6 col-md-4">
            <div class="card mb-3 shadow">
                <div class="card-body text-center">
                    <i class="fa-solid fa-users fa-2x py-2" style="color: #1CB78D"></i>
                    <h5 class="card-title">Jumlah Siswa</h5>
                    <p class="card-text">{{ $jumlah_anggota_kelas }} Siswa</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="mb-4">Pengumuman Terbaru</h2>
        <div class="row">
            @foreach ($data_pengumuman as $pengumuman)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                            <p class="card-text">{{ $pengumuman->isi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
