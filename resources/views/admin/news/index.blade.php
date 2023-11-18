@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Berita Sekolah</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Button Trigger Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
        Tambah Berita
    </button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/news" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Berita Sekolah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="news" class="form-label">Nama Berita</label>
                            <input type="text" class="form-control @error('news') is-invalid @enderror" id="news"
                                name="news" required autofocus value="{{ old('news') }}">
                            @error('news')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage(this, '.img-preview')">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3"
                                value="{{ old('body') }}"></textarea>
                            @error('body')
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
                    <th scope="col">Nama Berita</th>
                    <th scope="col">Body</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_news as $news)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $news->news }}</td>
                        <td>{{ $news->body }}</td>
                        <td>
                            <a href="/admin/news/{{ $news->id }}" class="badge bg-info"><span data-feather="info"
                                    class="align-text-bottom"></span></a>
                            <button class="badge bg-warning border-0" data-bs-toggle="modal"
                                data-bs-target="#modal-edit-{{ $news->id }}">
                                <span data-feather="edit" class="align-text-bottom"></span>
                            </button>

                            <form action="/admin/news/{{ $news->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Apakah data akan dihapus?')">
                                    <span data-feather="trash-2" class="align-text-bottom"></span>
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modal-edit-{{ $news->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="/admin/news/{{ $news->id }}"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data news</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="news" class="form-label">Nama News</label>
                                            <input type="text" class="form-control @error('news') is-invalid @enderror"
                                                id="news" name="news" required value="{{ $news->news }}">
                                            @error('news')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Photo</label>
                                            <img src="{{ asset('storage/' . $news->image) }}"
                                                class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                                id="img-preview-edit-{{ $news->id }}">
                                            <input type="hidden" name="oldImage" value="{{ $news->image }}">
                                            <input class="form-control @error('image') is-invalid @enderror"
                                                type="file" id="image-edit-{{ $news->id }}" name="image"
                                                onchange="previewImage(this, '#img-preview-edit-{{ $news->id }}')">

                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="body" class="form-label">Body</label>
                                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3"
                                                required>{!! old('body', $news->body) !!}</textarea>
                                            @error('body')
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
    </div>

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

        // Call the previewImage function when selecting a file in the modal for adding news
        document.getElementById('image').addEventListener('change', function() {
            previewImage(this, '.img-preview');
        });

        // Call the previewImage function dynamically for each modal when editing news
        @foreach ($data_news as $news)
            document.getElementById('image-edit-{{ $news->id }}').addEventListener('change', function() {
                previewImage(this, '#img-preview-edit-{{ $news->id }}');
            });
        @endforeach
    </script>
@endsection
