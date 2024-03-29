@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Guru</h1>

        <!-- Button Trigger Modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-tambah">
            Tambah Guru
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
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>L/P</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->nama_guru }}, {{ $guru->gelar }}</td>
                    <td>{{ $guru->jenis_kelamin == 0 ? 'L' : 'P' }}</td>
                    <td>{{ $guru->tanggal_lahir }}</td>
                    <td>
                        <a href="/admin/guru/{{ $guru->id }}" class="badge bg-info">
                            <i class="fa-solid fa-circle-info fa-xl py-2"></i>
                        </a>
                        <button class="badge bg-warning border-0" data-bs-toggle="modal"
                            data-bs-target="#modal-edit-{{ $guru->id }}">
                            <i class="fa-solid fa-pen-to-square fa-xl py-2"></i>
                        </button>

                        <form action="/admin/guru/{{ $guru->id }}" method="post" class="d-inline">
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
                <div class="modal fade" id="modal-edit-{{ $guru->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="/admin/guru/{{ $guru->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Guru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="nama_guru" class="form-label">Nama Guru</label>
                                        <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                            id="nama_guru" name="nama_guru" required value="{{ $guru->nama_guru }}">
                                        @error('nama_guru')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="gelar" class="form-label">Gelar <span>(opsional)</span></label>
                                        <input type="text" class="form-control @error('gelar') is-invalid @enderror"
                                            id="gelar" name="gelar" value="{{ $guru->gelar }}">
                                        @error('gelar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="nip" class="form-label">NIP <span>(opsional)</span></label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            id="nip" name="nip" value="{{ $guru->nip }}">
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_laki"
                                                    name="jenis_kelamin" value="0"
                                                    @if ($guru->jenis_kelamin == 0) checked @endif required>
                                                <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="jenis_kelamin_perempuan"
                                                    name="jenis_kelamin" value="1"
                                                    @if ($guru->jenis_kelamin == 1) checked @endif required>
                                                <label class="form-check-label"
                                                    for="jenis_kelamin_perempuan">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-2">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir"
                                            name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" required>
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
                                            value="{{ $guru->alamat }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Photo</label>
                                        <img src="{{ asset('storage/' . $guru->image) }}"
                                            class="img-preview img-fluid col-sm-5 d-block"
                                            id="img-preview-edit-{{ $guru->id }}">
                                        <input type="hidden" name="oldImage" value="{{ $guru->image }}">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image-edit-{{ $guru->id }}" name="image"
                                            onchange="previewImage(this, '#img-preview-edit-{{ $guru->id }}')">

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
                <form method="post" action="/admin/guru" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                id="nama_guru" name="nama_guru" required autofocus value="{{ old('nama_guru') }}">
                            @error('nama_guru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="gelar" class="form-label">Gelar <span>(opsional)</span></label>
                            <input type="text" class="form-control @error('gelar') is-invalid @enderror"
                                id="gelar" name="gelar" value="{{ old('gelar') }}">
                            @error('gelar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="nip" class="form-label">NIP <span>(opsional)</span></label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                name="nip" value="{{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin_laki"
                                        name="jenis_kelamin" value="0" required>
                                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="jenis_kelamin_perempuan"
                                        name="jenis_kelamin" value="1" required>
                                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
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
                            <label for="image" class="form-label">Photo</label>
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

    <!-- Add this script before the closing </body> tag -->
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

        // Call the previewImage function when selecting a file in the modal for adding guru
        document.getElementById('image').addEventListener('change', function() {
            previewImage(this, '.img-preview');
        });

        // Call the previewImage function dynamically for each modal when editing guru
        @foreach ($gurus as $guru)
            document.getElementById('image-edit-{{ $guru->id }}').addEventListener('change', function() {
                previewImage(this, '#img-preview-edit-{{ $guru->id }}');
            });
        @endforeach
    </script>
@endsection
