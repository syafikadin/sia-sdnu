@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Pembelajaran</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive col-lg-10">        
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelajarans as $pembelajaran)    
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pembelajaran->kelas->nama_kelas }}</td>
            <td>{{ $pembelajaran->mapel->nama_mapel }}</td>
            <td>{{ $pembelajaran->guru->nama_guru }}</td>
            {{-- <td>{{ $pembelajaran->ringkasan }}</td>
            <td>
                <button class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $pembelajaran->id }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </button>

                <form action="/admin/pembelajaran/{{ $pembelajaran->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td> --}}
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit-{{ $pembelajaran->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/admin/pembelajaran/{{ $pembelajaran->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data pembelajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="nama_pembelajaran" class="form-label">Nama pembelajaran</label>
                                    <input type="text" class="form-control @error('nama_pembelajaran') is-invalid @enderror" id="nama_pembelajaran" name="nama_pembelajaran" required value="{{ $pembelajaran->nama_pembelajaran }}">
                                    @error('nama_pembelajaran')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="ringkasan" class="form-label">Ringkasan</label>
                                    <input type="text" class="form-control @error('ringkasan') is-invalid @enderror" id="ringkasan" name="ringkasan" required value="{{ $pembelajaran->ringkasan }}">
                                    @error('ringkasan')
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