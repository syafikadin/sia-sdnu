@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Tahun Pelajaran</h1>

        <!-- Button Trigger Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tambah">
            Tambah Tahun Pelajaran
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

    <table id="tapel-table" class="table table-striped" style="width: 100%">
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
                    <td>{{ $tapel->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/tapel" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Tahun Pelajaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
                            <input type="text" class="form-control @error('tahun_pelajaran') is-invalid @enderror"
                                id="tahun_pelajaran" name="tahun_pelajaran" required autofocus
                                value="{{ old('tahun_pelajaran') }}">
                            @error('tahun_pelajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="semester" class="form-label">Semester</label><br>
                            <label class="radio-inline mr-3">
                                <input type="radio" @error('semester') is-invalid @enderror id="semester" name="semester"
                                    required value="1" @if (old('semester') == '1') checked @endif> Semester
                                Ganjil
                            </label>
                            <label class="radio-inline mr-3">
                                <input type="radio" @error('semester') is-invalid @enderror id="semester" name="semester"
                                    required value="2" @if (old('semester') == '2') checked @endif> Semester Genap
                            </label>
                            @error('semester')
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
