@extends('layouts.main')

@section('container')
    @include('partials.navbar')
    <div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="\img\IMG_2189.jpg" class="d-block w-100" alt="First slide"
                        style="max-height: 500px; object-fit: cover">
                    <div class="carousel-caption">
                        {{-- <h4 class="font-weight-bold text-shadow-effect">SD NU Kepanjen</h4>
                        <p class="text-shadow-effect">"Menumbuhkan kecerdasan, mendukung kreativitas, dan mewujudkan masa
                            depan yang cerah. Bergabunglah dengan kami untuk petualangan belajar yang menyenangkan!"</p> --}}
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1682685796186-1bb4a5655653?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="d-block w-100" alt="First slide" style="max-height: 500px; object-fit: cover">
                    <div class="carousel-caption">
                        <h4 class="font-weight-bold text-shadow-effect">SD NU Kepanjen</h4>
                        <p class="text-shadow-effect">"Menumbuhkan kecerdasan, mendukung kreativitas, dan mewujudkan masa
                            depan yang cerah. Bergabunglah dengan kami untuk petualangan belajar yang menyenangkan!"</p>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

        </div>

        <div class="container news">
            <h3 class="font-weight-bold font-black">Berita terbaru</h3>
            <hr class="border-grey" />
            <div class="row">
                @foreach ($data_berita as $berita)
                    <div class="col-md-3 col-sm-6">
                        <div class="card shadow-effect mt-3">
                            @if ($berita->image)
                                <img src="{{ asset('storage/' . $berita->image) }}" alt="image"
                                    class="card-img-top img-fluid">
                            @else
                                {{-- <img src="https://source.unsplash.com/400x300?{{ $berita->category->name }}" class="card-img-top" alt=""> --}}
                            @endif
                            <div class="card-body">
                                <h6 class="card-title"><a href="/berita/{{ $berita->id }}"
                                        class="text-decoration-none">{{ $berita->news }}</a></h6>
                                <p class="card-text text-small">{!! Str::limit($berita->body, 50) !!}</p>
                                <a href="/berita/{{ $berita->id }}" class="btn btn-success button-success w-100">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="why">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="\img\5.webp" alt="image-islamic" class="img-fluid"
                            style="width: 100%; max-height: 400px; object-fit: cover">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3 class="font-weight-bold font-black">Kenapa memilih kami?</h3>


                        <div>
                            <p><i class="bi bi-check"></i> Pendidikan Islami yang Berkualitas</p>
                            <p><i class="bi bi-check"></i> Program Unggulan yang Beragam</p>
                            <p><i class="bi bi-check"></i> Prestasi Hebat dan Beragam</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container profile">
            <img src="img/nu-logo.png" alt="image-islamic" class="img-fluid mb-5">

            <div class="row text-black">
                <div class="col-md-6 col-sm-12">
                    <h5>Profile</h5>
                    <p>SD NU Kepanjen adalah sekolah negeri swasta di kepanjen. SD ini berpengalaman dari tahun 1990 yang
                        telah terakreditasi B. SD NU berada di bawah naungan yayasan Hasyim Asy'ari</p>
                    <p>SD NU Memiliki Visi Sebagai Berikut :</p>
                    <p>1. Terwujudnya peserta didik yang menjalankan syariat islam dengan tekun dan benar serta berkemampuan
                        akademik yang bersaing</p>
                </div>
                <div class="col-md-6 col-sm-12">

                    <h5>Kontak</h5>
                    <p class="mb-1">Alamat: Jl. sultan agung No. 123 Kepanjen, Malang</p>
                    <p class="mb-1">Telepon: (021) 1234-5678</p>
                    <p class="mb-1">Email: info@sdsnu.com</p>

                </div>
            </div>


        </div>

        <div class="container mb-5">
            <h3 class="font-weight-bold font-black">Galeri</h3>
            <hr class="border-grey" />

            @include('components.galery')
        </div>
    </div>
    @include('components.footer')
@endsection
