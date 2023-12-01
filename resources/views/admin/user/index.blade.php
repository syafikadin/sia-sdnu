@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Data User</h1>
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

    <table id="my-table" class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_user as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role == 1 ? 'Admin' : ($user->role == 2 ? 'Guru' : 'Siswa') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal Edit --}}
    {{-- <div class="modal fade" id="modal-edit-{{ $siswa->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/admin/siswa/{{ $siswa->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" required value="{{ $siswa->nama_siswa }}">
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>
                    
                                <div class="mb-2">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" required value="{{ $siswa->nis }}">
                                    @error('nis')
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
            </div> --}}
    {{-- End Modal Edit --}}
@endsection
