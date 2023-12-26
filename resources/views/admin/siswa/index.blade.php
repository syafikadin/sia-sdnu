@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Siswa</h1>
        <!-- Button Trigger Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tambah">
            Tambah Siswa
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

    <table id="guru-table" class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Kelas Saat Ini</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_siswa as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->jenis_kelamin == 0 ? 'L' : 'P' }}</td>
                    <td>{{ $siswa->kelas ? $siswa->kelas->nama_kelas : 'Siswa Belum Masuk Kelas' }}</td>
                    <td>{{ $siswa->tanggal_lahir }}</td>
                    <td>
                        <a href="/admin/siswa/{{ $siswa->id }}" class="badge bg-info">
                            <i class="fa-solid fa-circle-info fa-xl py-2"></i></a>
                        <button class="badge bg-warning border-0" data-bs-toggle="modal"
                            data-bs-target="#modal-edit-{{ $siswa->id }}">
                            <i class="fa-solid fa-pen-to-square fa-xl py-2"></i>
                        </button>

                        <form action="/admin/siswa/{{ $siswa->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apa anda yakin menghapus data ini?')">
                                <i class="fa-solid fa-trash fa-xl py-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>


                {{-- Modal Edit --}}
                <div class="modal fade" id="modal-edit-{{ $siswa->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/admin/siswa/{{ $siswa->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                            id="nama_siswa" name="nama_siswa" required value="{{ $siswa->nama_siswa }}">
                                        @error('nama_siswa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                            id="nis" name="nis" required value="{{ $siswa->nis }}">
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select name="kelas_id" class="form-select" aria-label="Pilih Kelas">
                                            <option value="" selected disabled>-- Pilih Kelas --</option>
                                            @foreach ($data_kelas as $kelas)
                                                <option value="{{ $kelas->id }}"
                                                    @if ($kelas->id == $siswa->kelas_id) selected @endif>
                                                    {{ $kelas->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin"
                                                    name="jenis_kelamin" value="0"
                                                    @if ($siswa->jenis_kelamin == 0) checked @endif required>
                                                <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin"
                                                    name="jenis_kelamin" value="1"
                                                    @if ($siswa->jenis_kelamin == 1) checked @endif required>
                                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir"
                                            name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" required autofocus
                                            value="{{ $siswa->alamat }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Foto</label>
                                        <img src="{{ asset('storage/' . $siswa->image) }}"
                                            class="img-preview img-fluid col-sm-5 d-block"
                                            id="img-preview-edit-{{ $siswa->id }}">
                                        <input type="hidden" name="oldImage" value="{{ $siswa->image }}">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image-edit-{{ $siswa->id }}" name="image"
                                            onchange="previewImage(this, '#img-preview-edit-{{ $siswa->id }}')">

                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                id="nama_siswa" name="nama_siswa" required autofocus value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis"
                                name="nis" required value="{{ old('nis') }}">
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="kelas_id" class="form-select" aria-label="Pilih Kelas" required>
                                <option value="" selected disabled>-- Pilih Kelas --</option>
                                @foreach ($data_kelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin"
                                        name="jenis_kelamin" value="0" required>
                                    <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin"
                                        name="jenis_kelamin" value="1" required>
                                    <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" name="alamat" required value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="image" class="form-label">Foto</label>
                            <img class="img-preview img-fluid col-sm-5 d-block">
                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                id="image" name="image" onchange="previewImage(this, '.img-preview')">
                            @error('image')
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

    <script>
        function previewImage(input, previewSelector) {
            const image = input.files[0];
            const imgPreview = document.querySelector(previewSelector);

            const oFReader = new FileReader();

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            if (image) {
                oFReader.readAsDataURL(image);
            }
        }

        // Call the previewImage function when selecting a file in the modal for adding siswa
        document.getElementById('image').addEventListener('change', function() {
            previewImage(this, '.img-preview');
        });

        // Call the previewImage function dynamically for each modal when editing siswa
        @foreach ($data_siswa as $siswa)
            document.getElementById('image-edit-{{ $siswa->id }}').addEventListener('change', function() {
                previewImage(this, '#img-preview-edit-{{ $siswa->id }}');
            });
        @endforeach
    </script>
@endsection
