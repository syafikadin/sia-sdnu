<?php

namespace App\Http\Controllers;

use App\Models\News;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Berita';
        $data_berita = News::latest()->filter(request(['search']))->paginate(7)->withQueryString();

        return view('berita', compact('title', 'data_berita'));
    }

    public function selectedBerita(News $berita)
    {
        return view('detailberita', [
            "title" => "Detail Berita",
            "berita" => $berita
        ]);
    }
}
