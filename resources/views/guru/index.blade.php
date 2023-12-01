@extends('guru.layouts.main')

@section('container')
    <div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-chalkboard-user fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Kelas</h5>
                        <p class="card-text">{{ $data_anggota_kelas }} Kelas Diampu</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-laptop-file fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Mapel</h5>
                        <p class="card-text">{{ $data_anggota_kelas }} Mapel Diampu</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-6 col-md-4">
                <div class="card mb-3 shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users fa-2x py-2" style="color: #1CB78D"></i>
                        <h5 class="card-title">Jumlah Siswa</h5>
                        <p class="card-text">{{ $data_anggota_kelas }} Siswa Diampu</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="card-title">Capaian Proses Penilaian</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-success">
                                            <tr>
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2" class="text-center">Kelas</th>
                                                <th rowspan="2" class="text-center">Mata Pelajaran</th>
                                                <th colspan="6" class="text-center" style="width: 100px;">Input Nilai
                                                </th>
                                                {{-- <th colspan="2" class="text-center" style="width: 100px;">Status Nilai Raport</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($data_capaian_penilaian as $penilaian)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $penilaian->kelas->nama_kelas }}</td>
                                                    <td>{{ $penilaian->mapel->nama_mapel }}</td>
                                                    @if ($penilaian->jumlah_telah_dinilai == 0)
                                                        <td class="text-danger text-center"><b>Belum Dinilai</b></td>
                                                    @else
                                                        <td class="text-success text-center"><b>Sudah Dinilai</b></td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
