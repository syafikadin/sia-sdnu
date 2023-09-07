<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::where('user_id', Auth::user()->id)->first();
        // dd($guru->id);

        $id_kelas = Kelas::all();

        $data_anggota_kelas = count(Pembelajaran::where('guru_id', $guru->id)->get());

        $data_capaian_penilaian = Pembelajaran::where('guru_id', $guru->id)->get();

        foreach ($data_capaian_penilaian as $penilaian) {
            $nilai = Nilai::where('pembelajaran_id', $penilaian->id)->get();
            $penilaian->$nilai = count($nilai);

            $penilaian->jumlah_telah_dinilai = count($nilai);
        }

        return view('guru.index', compact(
            'data_anggota_kelas',
            'data_capaian_penilaian'
        ));
    }
}
