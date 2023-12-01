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

    <table id="pembelajaran-table" class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Wali Kelas</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelajarans as $pembelajaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembelajaran->kelas->nama_kelas }}</td>
                    <td>{{ $pembelajaran->mapel->nama_mapel }}</td>
                    <td>{{ $pembelajaran->guru->nama_guru }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
