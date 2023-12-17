@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengumuman</h1>

        <!-- Button Trigger Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tambah">
            Tambah Pengumuman
        </button>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            @foreach ($data_pengumuman->sortByDesc('created_at') as $pengumuman)
                <div class="card mb-3">
                    <div class="card-header d-flex">
                        <h5 class="me-auto">Admin - {{ $pengumuman->judul }}</h5>
                        <span class="time"><i class="far fa-clock"></i> {{ $pengumuman->created_at }}</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $pengumuman->isi }}</p>
                        <button class="badge bg-warning border-0" data-bs-toggle="modal"
                            data-bs-target="#modal-edit-{{ $pengumuman->id }}">
                            <i class="fa-solid fa-pen-to-square fa-xl py-2"></i> Edit
                        </button>
                        <form action="/admin/pengumuman/{{ $pengumuman->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apa anda yakin menghapus data ini?')">
                                <i class="fa-solid fa-trash fa-xl py-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Modal Edit --}}
                <div class="modal fade" id="modal-edit-{{ $pengumuman->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/admin/pengumuman/{{ $pengumuman->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Pengumuman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" required value="{{ $pengumuman->judul }}">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="isi" class="form-label">Isi</label>
                                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" id="isi" rows="3" required>{{ $pengumuman->isi }}</textarea>
                                        @error('isi')
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
        </div>
    </div>

    {{-- <table id="tapel-table" class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun Pelajaran</th>
                <th scope="col">Semester</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($tapels as $tapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tapel->tahun_pelajaran }}</td>
                    <td>{{ $tapel->semester }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/pengumuman" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                id="judul" name="judul" required autofocus value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="isi" class="form-label">Isi</label><br>
                            <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" id="isi" rows="3"
                                required></textarea>
                            @error('isi')
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
@endsection
