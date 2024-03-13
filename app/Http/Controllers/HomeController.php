<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $data_berita = News::latest()->filter(request(['search']))->paginate(7)->withQueryString();

        // dd($data_berita);

        return view('home', compact('title', 'data_berita'));
    }
}
