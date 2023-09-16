@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                      @csrf
                      @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session('loginError') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                      
                      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                      <div class="form-floating mb-2">
                        <input type="text" name="username" id="username" placeholder="username" autofocus required value="{{ old('username') }}" class="form-control
                        @error('username')
                            is-invalid
                        @enderror">
                        <label for="username">Username</label>
                        @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror

                      </div>
                      <div class="form-floating mb-2">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control
                        @error('password')
                            is-invalid
                        @enderror" required>
                        <label for="password">Password</label>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror

                      </div>

                      <div class="form-floating mb-2">
                        <select class="form-select" name="tahun_pelajaran" aria-label="Default select example">
                          <option value="" selected>-- Pilih Tahun Pelajaran --</option>
                          <?php $no = 0; ?>
                          @foreach($data_tapel as $tapel)
                          <?php $no++; ?>
                          <option value="{{$tapel->id}}" @if($no==1) selected @endif>{{$tapel->tahun_pelajaran}}
                            @if($tapel->semester == 1)
                            Ganjil
                            @else
                            Genap
                            @endif
                          </option>
                          @endforeach
                        </select>
                        {{-- <select class="form-control" name="tahun_pelajaran">
                          <option value="" disabled>-- Pilih Tahun Pelajaran -- </option>
                          <?php $no = 0; ?>
                          @foreach($data_tapel as $tapel)
                          <?php $no++; ?>
                          <option value="{{$tapel->id}}" @if($no==1) selected @endif>{{$tapel->tahun_pelajaran}}
                            @if($tapel->semester == 1)
                            Ganjil
                            @else
                            Genap
                            @endif
                          </option>
                          @endforeach
                        </select> --}}
                      </div>
    
                      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center mt-3">Not Registered? Please Contact Admin</small>
                  </main>
            </div>
        </div>       
    </div>
@endsection