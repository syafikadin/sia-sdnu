<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiAkhirSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Nilai Akhir Semester  ';
        $siswa = Siswa::where('user_id', Auth::user()->id)->first();
        $data_id_kelas = Kelas::where('tapel_id', session()->get('tapel_id'))->get('id');
        $anggota_kelas = Siswa::whereIn('kelas_id', $data_id_kelas)->where('id', $siswa->id)->first();
        $data_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas->id)->get();


        // Nilai pada index
        if (is_null($anggota_kelas)) {
            return back()->with('error', 'Anda belum masuk ke anggota kelas');
        } else {
            $data_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas_id)->get();
            foreach ($data_pembelajaran as $pembelajaran) {
                $pembelajaran->nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->where('siswa_id', $anggota_kelas->id)->first();
            }

            // Mencari rata-rata kelas
            $rata_kelas = 0;
            foreach ($data_pembelajaran as $pembelajaran) {
                $nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->get();

                $total_nilai_kelas = 0; // Inisialisasi total nilai kelas

                foreach ($nilai as $item_nilai) {
                    $total_nilai_kelas += $item_nilai->ko1;
                }

                $jumlah_siswa = count($nilai); // Jumlah siswa dalam kelas
                if ($jumlah_siswa > 0) {
                    $pembelajaran->rata_kelas = number_format($total_nilai_kelas / $jumlah_siswa, 1);
                } else {
                    $pembelajaran->rata_kelas = 0;
                }
            }

            return view('siswa.nilaisemester.index', compact('title', 'siswa', 'data_pembelajaran'));
        }
    }
}
