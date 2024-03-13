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
                    <form action="{{ route('nilai.update', $pembelajaran->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="card-body">
                            <div class="callout callout-info">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                                    <div class="col-sm-10 mb-2">
                                        <input type="text" class="form-control"
                                            value="{{ $pembelajaran->mapel->nama_mapel }} {{ $pembelajaran->kelas->nama_kelas }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center" style="width: 5%;">No</th>
                                            <th class="text-center">Nama Siswa</th>
                                            <th class="text-center">Nilai KO1</th>
                                            <th class="text-center">Nilai KO2</th>
                                            <th class="text-center">Nilai SUB1</th>
                                            <th class="text-center">Nilai SUB2</th>
                                            <th class="text-center">Nilai Praktik</th>
                                            <th class="text-center">UTS UAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_nilai as $nilai)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $nilai->anggota_kelas->siswa->nama_siswa }}</td>
                                                <input type="hidden" name="anggota_kelas_id[]"
                                                    value="{{ $nilai->anggota_kelas_id }}">
                                                <td>
                                                    <input type="number" class="form-control" name="ko1[]"
                                                        value="{{ $nilai->ko1 }}" min="0" max="100"
                                                        step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="ko2[]"
                                                        value="{{ $nilai->ko2 }}" min="0" max="100"
                                                        step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="sub1[]"
                                                        value="{{ $nilai->sub1 }}" min="0" max="100"
                                                        step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="sub2[]"
                                                        value="{{ $nilai->sub2 }}" min="0" max="100"
                                                        step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="praktik[]"
                                                        value="{{ $nilai->praktik }}" min="0" max="100"
                                                        step="0.01" required>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="uts_uas[]"
                                                        value="{{ $nilai->uts_uas }}" min="0" max="100"
                                                        step="0.01" required>
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
                <!-- /.card -->
            </div>

        </div>
    </div>
@endsection
