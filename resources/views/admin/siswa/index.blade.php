@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Siswa</h1>
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

    <!-- Button Trigger Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
        Tambah Siswa
    </button>
    
    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/admin/siswa" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" required autofocus value="{{ old('nama_siswa') }}">
                        @error('nama_siswa')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>
        
                    <div class="mb-2">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" required value="{{ old('nis') }}">
                        @error('nis')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas_id" class="form-select" aria-label="Default select example">
                            <option selected>--Pilih Kelas--</option>
                            @foreach ($data_kelas as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="0">
                                <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1">
                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat') }}">
                        @error('alamat')
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
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">L/P</th>
                <th scope="col">Kelas Saat Ini</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_siswa->sortBy('NIS') as $siswa)    
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ ($siswa->jenis_kelamin == 0) ? 'L' : 'P' }}</td>
            <td>{{ $siswa->kelas->nama_kelas }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>
                <a href="/admin/siswa/{{ $siswa->id }}" class="badge bg-info"><span data-feather="info" class="align-text-bottom"></span></a>
                {{-- <a href="/admin/siswa/{{ $siswa->id }}/edit" class="badge bg-warning"></a>  --}}
                <button class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $siswa->id }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </button>

                <form action="/admin/siswa/{{ $siswa->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit-{{ $siswa->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                                <div class="mb-2">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas_id" class="form-select" aria-label="Default select example">
                                        <option selected>--Pilih Kelas--</option>
                                        @foreach ($data_kelas as $kelas)
                                            <option value="{{ $kelas->id }}" required @if($kelas->id == $siswa->kelas->id) selected @endif >{{ $kelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                <div class="mb-2">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="0" @if ($siswa->jenis_kelamin == 0) checked @endif required>
                                            <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1" @if ($siswa->jenis_kelamin == 1) checked @endif required>
                                            <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="mb-2">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>
            
                                <div class="mb-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ $siswa->alamat }}">
                                    @error('alamat')
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