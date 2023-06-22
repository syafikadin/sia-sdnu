@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Kelas</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Button Trigger Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
        Tambah Kelas
    </button>
    
    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/admin/kelas" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" required autofocus value="{{ old('nama_kelas') }}">
                        @error('nama_kelas')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="guru_id" class="form-label">Wali Kelas</label>
                        <select name="guru_id" class="form-select" aria-label="Default select example">
                            <option selected>--Pilih Wali Kelas--</option>
                            @foreach ($data_guru as $guru)
                                <option value="{{ $guru->id }}" required>{{ $guru->nama_guru }}, {{ $guru->gelar }}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    {{-- End Modal Tambah --}}

    <div class="table-responsive col-lg-10">        
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Jumlah Siswa</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_kelas->sortBy('nama_kelas') as $kelas)    
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kelas->nama_kelas }}</td>
            <td>{{ $kelas->guru->nama_guru }}, {{ $kelas->guru->gelar }}</td>
            <td>{{ $kelas->jumlah_anggota }}</td>
            <td>
                <button class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $kelas->id }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </button>

                <form action="/admin/kelas/{{ $kelas->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit-{{ $kelas->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/admin/kelas/{{ $kelas->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="nama_kelas" class="form-label">Nama kelas</label>
                                    <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" required value="{{ $kelas->nama_kelas }}">
                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>
                    
                                <div class="mb-2">
                                    <label for="guru_id" class="form-label">Wali Kelas</label>
                                    <select name="guru_id" class="form-select" aria-label="Default select example">
                                        <option selected>--Pilih Wali Kelas--</option>
                                        @foreach ($data_guru as $guru)
                                            <option value="{{ $guru->id }}" required @if($guru->id == $kelas->guru->id) selected @endif >{{ $guru->nama_guru }}, {{ $guru->gelar }}</option>
                                        @endforeach
                                    </select>
                                    @error('guru_id')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>
                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Modal Edit --}}


            @endforeach
        </tbody>
        </table>
    </div>
@endsection