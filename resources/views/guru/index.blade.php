@extends('guru.layouts.main')

@section('container')
    <div>
                
        {{-- Main Content --}}
        <section class="content-header">
            <div class="container-fluid">

                {{-- Info --}}
                <div class="callout callout-success">
                    <h5>SD NU Kepanjen</h5>
                    <p>Tahun Pelajaran 2023</p>
                </div>
                <!-- End Info  -->

                {{-- Info Box --}}
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-layer-group"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Jumlah Kelas</span>
                        <span class="info-box-number">{{$data_anggota_kelas}} <small>kelas diampu</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Jumlah Mapel</span>
                        <span class="info-box-number">{{$data_anggota_kelas}} <small>mapel diampu</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Jumlah Siswa</span>
                        <span class="info-box-number">{{$data_anggota_kelas}} <small>siswa diampu</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                
        <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Capaian Proses Penilaian</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
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
                      <th colspan="6" class="text-center" style="width: 100px;">Input Nilai</th>
                      {{-- <th colspan="2" class="text-center" style="width: 100px;">Status Nilai Raport</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0; ?>
                    @foreach($data_capaian_penilaian as $penilaian)
                    <?php $no++ ?>
                    <tr>
                      <td class="text-center">{{$no}}</td>
                      <td class="text-center">{{$penilaian->kelas->nama_kelas}}</td>
                      <td>{{$penilaian->mapel->nama_mapel}}</td>
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