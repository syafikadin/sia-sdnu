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

    <div class="table-responsive col-lg-8">
        <a href="/admin/siswa/create" class="btn btn-primary">Buat Siswa</a>
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">L/P</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)    
            <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama_siswa }}</td>
            <td>{{ $siswa->tanggal_lahir }}</td>
            <td>{{ ($siswa->jenis_kelamin == 0) ? 'L' : 'P' }}</td>
            <td>{{ $siswa->kelas->nama_kelas }}</td>
            <td class="text-center">
                <a href="/admin/siswa/{{ $siswa->id }}" class="badge bg-info"><span data-feather="info" class="align-text-bottom"></span></a>
                <a href="/admin/siswa/{{ $siswa->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                
                <form action="/admin/siswa/{{ $siswa->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
                    <span data-feather="trash-2" class="align-text-bottom"></span>
                </button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection