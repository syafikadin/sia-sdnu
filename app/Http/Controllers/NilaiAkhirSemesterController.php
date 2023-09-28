<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Pembelajaran;
use App\Models\Sekolah;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

            return view('siswa.nilaisemester.index', compact('title', 'siswa', 'data_pembelajaran', 'anggota_kelas'));
        }
    }

    public function show(Request $request, $id)
    {
        $title = 'Raport PTS';

        $sekolah = Sekolah::first();

        $anggota_kelas = Siswa::findorfail($id);

        $kelas = Kelas::where('id', $anggota_kelas->kelas_id)->first();

        $total_siswa = count(Siswa::where('kelas_id', $kelas->id)->get());

        $data_id_mapel = Mapel::where('tapel_id', session()->get('tapel_id'))->get('id');

        $data_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas->id)->get();

        // dd($data_pembelajaran);

        $date = Carbon::now();
        $dateFormatted = $date->format('j F Y');

        $rata_kelas = 0;

        // Mencari rata-rata kelas
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

        // Nilai Raport per mapel
        foreach ($data_pembelajaran as $pembelajaran) {
            $nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($nilai)) {
                $pembelajaran->nilai_ko1 = 0;
            } else {
                $pembelajaran->nilai_ko1 = $nilai->ko1;
            }
        }

        $raport = PDF::loadview('admin.raport.raport', compact('title', 'sekolah', 'anggota_kelas', 'data_id_mapel', 'data_pembelajaran', 'dateFormatted', 'total_siswa'));
        return $raport->stream('RAPORT ' . $anggota_kelas->nama_siswa . ' (' . $anggota_kelas->kelas->nama_kelas . ').pdf');
    }
}
