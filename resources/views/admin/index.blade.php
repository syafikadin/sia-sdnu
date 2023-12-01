@extends('admin.layouts.main')

@section('container')
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="card mb-3 shadow">
            <div class="card-header">
                <h5>SD NU Kepanjen</h5>
                <p>Tahun Pelajaran 2023</p>
            </div>
        </div>

        <div class="row">
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-chalkboard-user fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Guru</h5>
                        <p class="card-text">{{ $jumlah_guru }} Guru</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Siswa</h5>
                        <p class="card-text">{{ $jumlah_siswa }} Siswa</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-landmark fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Kelas</h5>
                        <p class="card-text">{{ $jumlah_kelas }} Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
