@extends('layouts.main')

@section('container')
    @include('partials.navbar')

    <div class="container fasilitas mt-3">
        <div class="row g-3">
            <div class="col-lg-12">
                <img src="https://images.unsplash.com/photo-1481253127861-534498168948?q=80&w=1373&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Gedung Sekolah" class="img-fasilitas">

                <h4 class="font-weight-bold font-black mt-4">Gedung Sekolah</h4>
                <p>
                    Gedung Sekolah SD ABC adalah tempat di mana petualangan belajar dimulai. Dengan desain modern dan
                    nyaman,
                    gedung ini menyediakan lingkungan yang ideal untuk pembelajaran yang menyenangkan dan produktif.
                </p>
            </div>

            <div class="col-lg-12 mt-5">
                <img src="https://images.unsplash.com/photo-1510531704581-5b2870972060?q=80&w=1473&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="" class="img-fasilitas">
                <h4 class="font-weight-bold font-black mt-4">Kelas</h4>
                <p>
                    Kelas-kelas di SD ABC adalah tempat di mana kreativitas bermekaran. Setiap kelas dilengkapi dengan
                    peralatan modern dan nyaman, menciptakan suasana belajar yang menyenangkan bagi para siswa.
                </p>
            </div>

        </div>
    </div>
    </div>
    @include('components.footer')
@endsection
