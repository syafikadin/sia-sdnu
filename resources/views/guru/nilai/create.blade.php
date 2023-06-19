@extends('guru.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                    <input type="text" class="form-control" value="{{$pembelajaran->mapel->nama_mapel}} - {{$pembelajaran->kelas->nama_kelas}}" readonly>
                  </div>
                </div>
              </div>

              <form action="{{ route('nilai.store') }}" method="POST">
                @csrf
                <input type="hidden" name="pembelajaran_id" value="{{$pembelajaran->id}}">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                      <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Nilai Tugas</th>
                        <th class="text-center">Nilai Ulangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_anggota_kelas->sortBy('siswa.nama_siswa') as $anggota_kelas)
                      <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{$anggota_kelas->nama_siswa}}</td>
                        <input type="hidden" name="siswa_id[]" value="{{$anggota_kelas->id}}">
                        <td>
                          <input type="number" class="form-control" name="nilai_tugas[]" min="0" max="100" required oninvalid="this.setCustomValidity('Nilai harus berisi antara 0 s/d 100')" oninput="setCustomValidity('')">
                        </td>
                        <td>
                          <input type="number" class="form-control" name="nilai_ulangan[]" min="0" max="100" required oninvalid="this.setCustomValidity('Nilai harus berisi antara 0 s/d 100')" oninput="setCustomValidity('')">
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