@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Mapel</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Button Trigger Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
        Tambah Mapel
    </button>
    
    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/admin/mapel" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data mapel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nama_mapel" class="form-label">Nama mapel</label>
                        <input type="hidden" class="form-control" name="tapel_id" value="{{$tapel->id}}" readonly>
                        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel" name="nama_mapel" required autofocus value="{{ old('nama_mapel') }}">
                        @error('nama_mapel')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="ringkasan" class="form-label">Ringkasan</label>
                        <input type="text" class="form-control @error('ringkasan') is-invalid @enderror" id="ringkasan" name="ringkasan" required autofocus value="{{ old('ringkasan') }}">
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
    {{-- End Modal Tambah --}}

    <div class="table-responsive col-lg-10">        
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama mapel</th>
                <th scope="col">Ringkasan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_mapel as $mapel)    
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mapel->nama_mapel }}</td>
            <td>{{ $mapel->ringkasan }}</td>
            <td>
                <button class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $mapel->id }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </button>

                <form action="/admin/mapel/{{ $mapel->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit-{{ $mapel->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/admin/mapel/{{ $mapel->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data mapel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="nama_mapel" class="form-label">Nama mapel</label>
                                    <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" id="nama_mapel" name="nama_mapel" required value="{{ $mapel->nama_mapel }}">
                                    @error('nama_mapel')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="ringkasan" class="form-label">Ringkasan</label>
                                    <input type="text" class="form-control @error('ringkasan') is-invalid @enderror" id="ringkasan" name="ringkasan" required value="{{ $mapel->ringkasan }}">
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