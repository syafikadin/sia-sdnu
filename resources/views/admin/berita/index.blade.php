@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Berita</h1>
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
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/admin/berita" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>   
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Photo</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>  
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="image" class="form-label">Body</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3" value="{{ old('body') }}"></textarea>
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
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_berita as $berita)    
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Str::limit($berita->title, 30) }}</td>
            <td>{{ Str::limit($berita->body, 50) }}</td>
            <td>
                <button class="badge bg-warning border-0" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $berita->id }}">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </button>

                <form action="/admin/berita/{{ $berita->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="modal-edit-{{ $berita->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/admin/berita/{{ $berita->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Berita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label for="title" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ $berita->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>   
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="image" class="form-label">Photo</label>
                                    @if ($berita->image)
                                      <img src="{{ asset('storage/' . $berita->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">  
                                    @else
                                      <img class="img-preview img-fluid mb-3 col-sm-5">    
                                    @endif
                                    
                                    <input type="hidden" name="oldImage" value="{{ $berita->image }}">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>  
                                    @enderror
                                  </div>

                                <div class="mb-2">
                                    <label for="body" class="form-label">Body</label>
                                    <input type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" required value="{{ $berita->body }}">
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
            {{-- End Modal Edit --}}


            @endforeach
        </tbody>
        </table>
    </div>

    <script>
        function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection