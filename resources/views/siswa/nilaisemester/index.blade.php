@extends('siswa.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <section class="content pt-3 pb-2 mb-3 border-bottom">
        <div class="container-fluid">
            <!-- ./row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">{{ $title }}</h3>
                                <form action="{{ route('nilaisemester.show', $anggota_kelas->id) }}" target="_black"
                                    method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><span
                                            class="nav-icon fas fa-print me-1"></span> Cetak Raport</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <div class="form-group row mb-2">
                                    <div class="col-sm-3">
                                        Nama Lengkap
                                    </div>
                                    <div class="col-sm-7">
                                        : {{ $siswa->nama_siswa }}
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-3">
                                        Nomor Induk Siswa
                                    </div>
                                    <div class="col-sm-9">
                                        : {{ $siswa->nis }}
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="text-center" rowspan="2" style="width: 5%;">No</th>
                                            <th class="text-center" rowspan="2" style="width: 45%;">Mata Pelajaran</th>
                                            <th class="text-center" colspan="3" style="width: 50%;">Nilai Akhir Semester
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" style="width: 20%;">Prestasi</th>
                                            <th class="text-center" style="width: 20%;">Rata - rata kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach ($data_pembelajaran as $pembelajaran)
                                            <?php $no++; ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td>{{ $pembelajaran->mapel->nama_mapel }}</td>
                                                @if (!is_null($pembelajaran->nilai))
                                                    <td class="text-center">{{ $pembelajaran->nilai->ko1 }}</td>
                                                    <td class="text-center">{{ $pembelajaran->rata_kelas }}</td>
                                                @else
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
