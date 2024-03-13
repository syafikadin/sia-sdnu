@extends('guru.layouts.main')

@section('container')
    <div class="container-fluid pt-3 pb-2 mb-3 border-bottom">
        <!-- ./row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list-ol"></i> Input Nilai</h3>
                    </div>

                    <div class="card-body">
                        <div class="callout callout-info">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10 mb-2">
                                    <input type="text" class="form-control"
                                        value="{{ $pembelajaran->mapel->nama_mapel }} - {{ $pembelajaran->kelas->nama_kelas }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('nilai.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pembelajaran_id" value="{{ $pembelajaran->id }}">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">No</th>
                                            <th class="text-center">Nama Siswa</th>
                                            <th class="text-center">Nilai KO 1</th>
                                            <th class="text-center">Nilai KO 2</th>
                                            <th class="text-center">Nilai SUB 1</th>
                                            <th class="text-center">Nilai SUB 2</th>
                                            <th class="text-center">Nilai Praktik</th>
                                            <th class="text-center">UTS UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_anggota_kelas->sortBy('siswa.nama_siswa') as $anggota_kelas)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $anggota_kelas->siswa->nama_siswa }}</td>
                                                <input type="hidden" name="siswa_id[]"
                                                    value="{{ $anggota_kelas->siswa->id }}">
                                                <td>
                                                    <input type="number" class="form-control" name="ko1[]" min="0"
                                                        max="100" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="ko2[]" min="0"
                                                        max="100" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="sub1[]" min="0"
                                                        max="100" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="sub2[]" min="0"
                                                        max="100" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="praktik[]"
                                                        min="0" max="100" step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="uts_uas[]"
                                                        min="0" max="100" step="0.01" required>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        <a href="{{ route('nilai.index') }}" class="btn btn-default float-right mr-2">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
