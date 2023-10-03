<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Berita';
        $data_berita = Berita::all();

        return view('berita', compact('title', 'data_berita'));
    }

    // public function selectedPost(Berita $post)
    // {
    //     return view('post', [
    //         "title" => "Single Post",
    //         "post" => $post
    //     ]);
    // }
}
