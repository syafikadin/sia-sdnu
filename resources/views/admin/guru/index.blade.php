@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Guru</h1>
    </div>

    <div class="table-responsive col-lg-8">
        <a href="/admin/guru/create" class="btn btn-primary">Buat guru</a>
        <table class="table table-striped table-sm mt-3">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)    
            <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $guru->nama }}</td>
            {{-- <td>{{ $guru->nama }}</td> --}}
            <td class="text-center">
                <a href="/admin/guru/{{ $guru->id }}" class="badge bg-info"><span data-feather="info" class="align-text-bottom"></span></a>
                <a href="/admin/guru/{{ $guru->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                
                <form action="/admin/guru/{{ $guru->id }}" method="post" class="d-inline">
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