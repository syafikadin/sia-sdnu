@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
      <!-- Main content -->
      <section class="content" style="width: 100%">
        <div class="container-fluid">
          <!-- ./row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title"><i class="fas fa-print"></i> {{$title}}</h3> --}}
                </div>
    
                <div class="card-body">
                  <div class="callout callout-info">
                    <form method="POST">
                      @csrf
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="kelas_id" style="width: 100%;" required onchange="this.form.submit();">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($data_kelas->sortBy('tingkatan_kelas') as $kelas)
                            <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
  
                <div class="table-responsive">
                    {{-- <tbody>
                      <?php $no = 0; ?>
                      @foreach($data_anggota_kelas->sortBy('siswa.nama_siswa') as $anggota_kelas)
                      <?php $no++; ?>
                      <tr>
                        <input type="hidden" name="siswa_id[]" value="{{$anggota_kelas->id}}">
                        <td class="text-center">{{$no}}</td>
                        <td class="text-center">{{$anggota_kelas->id}}</td>
                        <td>{{$anggota_kelas->nama_lengkap}}</td>
                        <td class="text-center">{{$anggota_kelas->jenis_kelamin == 0 ? 'Laki - laki' : 'Perempuan'}}</td>
                        <td class="text-center">
                          <form action="{{ route('raport.show', $anggota_kelas->id) }}" target="_black" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fas fa-print"></i> Raport PTS
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody> --}}
                  </table>
                </div>
    
              </div>
              <!-- /.card -->
            </div>
    
          </div>
          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
    </div>
@endsection