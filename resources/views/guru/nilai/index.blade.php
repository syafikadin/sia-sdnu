@extends('guru.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nilai Siswa</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- <div class="card text-end" style="width: 100%;">
      <div class="card-body">
        <button type="button" class="btn btn-primary" title="Download Format Nilai" data-bs-toggle="modal" data-bs-target="#modal-download">
          <span data-feather="download" class="align-text-bottom"></span>
        </button>
        <button type="button" class="btn btn-primary" title="Import Nilai" data-bs-toggle="modal" data-bs-target="#modal-upload">
          <span data-feather="upload" class="align-text-bottom"></span>
        </button>
      </div>
    </div> --}}


    <div class="table-responsive col-lg-8">
        <table class="table table-bordered table-striped table-sm mt-3">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="width: 100px;">No</th>
                    <th rowspan="2" class="text-center">Mata Pelajaran</th>
                    <th rowspan="2" class="text-center">Kelas</th>
                    <th colspan="2" class="text-center" style="width: 200px;">Jumlah</th>
                    <th rowspan="2" class="text-center" style="width: 100px;">Input Nilai</th>
                </tr>
                <tr>
                    <th class="text-center" style="width: 100px;">Anggota Kelas</th>
                    <th class="text-center" style="width: 100px;">Telah Dinilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_penilaian as $penilaian)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $penilaian->mapel->nama_mapel }}</td>
                        <td class="text-center">{{ $penilaian->kelas->nama_kelas }}</td>

                        @if ($penilaian->jumlah_anggota_kelas == 0)
                            <td class="text-danger text-center"><b>0</b> Siswa</td>
                        @else
                            <td class="text-success text-center"><b>{{ $penilaian->jumlah_anggota_kelas }}</b> Siswa</td>
                        @endif

                        @if ($penilaian->jumlah_telah_dinilai == 0)
                            <td class="text-danger text-center"><b>0</b> Siswa</td>
                        @else
                            <td class="text-success text-center"><b>{{ $penilaian->jumlah_telah_dinilai }}</b> Siswa</td>
                        @endif

                        @if ($penilaian->jumlah_anggota_kelas != 0)
                            <td class="text-center">
                                <form action={{ route('nilai.create') }} method="GET">
                                    @csrf
                                    <input type="hidden" name="pembelajaran_id" value="{{ $penilaian->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <span data-feather="plus" class="align-text-bottom"></span>
                                    </button>
                                </form>
                            </td>
                        @else
                            <td class="text-center">
                                <form action="{{ route('nilai.create') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="pembelajaran_id" value="{{ $penilaian->id }}">
                                    <button type="submit" class="btn btn-sm btn-primary"
                                        title="Belum ditemukan anggota kelas" disabled>
                                        <span data-feather="plus" class="align-text-bottom"></span>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Download -->
    <div class="modal fade" id="modal-download">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Download Format Import</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="contact-form" action="{{ route('exportnilai') }}" method="GET">
                    @csrf
                    <div class="modal-body">
                        <div class="callout callout-info">
                            <h5>Perhatian</h5>
                            <p>
                                - Silahkan pilih pembelajaran & download file format import melalui tombol dibawah ini.
                            </p>

                        </div>

                        <div class="form-group row pt-2">
                            <label class="col-sm-3 col-form-label">Pilih Pembelajaran</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="pembelajaran_id" required>
                                    <option value="">-- Pilih Pembelajaran --</option>
                                    @foreach ($data_penilaian as $penilaian)
                                        <option value="{{ $penilaian->id }}"> {{ $penilaian->mapel->nama_mapel }}
                                            {{ $penilaian->kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Download --}}
@endsection
