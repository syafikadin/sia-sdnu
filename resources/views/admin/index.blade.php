@extends('admin.layouts.main')

@section('container')
    <div>
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{$title}}</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
                
        {{-- Main Content --}}
        <section class="content">
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
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Jumlah Guru</span>
                        <span class="info-box-number">{{$jumlah_guru}} <small>kelas diampu</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Jumlah Siswa</span>
                        <span class="info-box-number">{{$jumlah_siswa}} <small>mapel diampu</small></span>
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
                        <span class="info-box-text">Jumlah Kelas</span>
                        <span class="info-box-number">{{$jumlah_kelas}} <small>siswa diampu</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                
        {{-- <div class="row">
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
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div> --}}

            </div>
        </section>

    </div>
@endsection