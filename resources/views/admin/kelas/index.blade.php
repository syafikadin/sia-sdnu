@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel kelas</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/admin/kelas/create" class="btn btn-primary">Buat kelas</a>
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Jumlah Siswa</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_kelas as $kelas)    
            <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $kelas->nama_kelas }}</td>
            <td>{{ $kelas->guru->nama_guru }}</td>
            <td>{{ $kelas->jumlah_anggota }}</td>
            <td class="text-center">
                <a href="/admin/kelas/{{ $kelas->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection