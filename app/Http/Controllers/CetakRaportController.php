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
use PDF;

class CetakRaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cetak Raport';
        $data_kelas = Kelas::all();
        return view('admin.raport.setClass', [
            'title' => 'Cetak Raport'
        ], compact('data_kelas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Cetak Raport';

        $kelas = Kelas::findorfail($request->kelas_id);

        // dd($kelas);

        $data_kelas = Kelas::get();

        $data_anggota_kelas = Siswa::where('kelas_id', $kelas->id)->get();

        return view('admin.raport.index', compact('title', 'kelas', 'data_kelas', 'data_anggota_kelas',));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title = 'Raport UAS';
        $sekolah = Sekolah::first();
        $anggota_kelas = Siswa::findorfail($id);

        $kelas = Kelas::where('id', $anggota_kelas->kelas_id)->first();
        $total_siswa = count(Siswa::where('kelas_id', $kelas->id)->get());

        $data_id_mapel = Mapel::where('tapel_id', session()->get('tapel_id'))->get('id');
        $data_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas->id)->whereIn('mapel_id', $data_id_mapel)->get();

        $date = Carbon::now();
        $dateFormatted = $date->format('j F Y');

        $rata_kelas = 0;

        // Mencari rata-rata kelas
        foreach ($data_pembelajaran as $pembelajaran) {
            $nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->whereIn('siswa_id', $anggota_kelas->pluck('id'))->get();

            $total_nilai_kelas = 0; // Inisialisasi total nilai kelas

            foreach ($nilai as $item) {
                $total_nilai_kelas += (($item->sub1 + $item->sub2 + $item->ko1 + $item->ko2 + $item->praktik + $item->uts_uas) / 6);
            }

            $jumlah_siswa = count($nilai); // Jumlah siswa dalam kelas
            if ($jumlah_siswa > 0) {
                $pembelajaran->rata_kelas = number_format($total_nilai_kelas / $jumlah_siswa, 1);
            } else {
                $pembelajaran->rata_kelas = 0;
            }
        }

        $total_nilai_array = []; // Array untuk menyimpan nilai-nilai
        $rata_rata_nilai = 0;

        // Nilai Raport per mapel
        foreach ($data_pembelajaran as $pembelajaran) {
            $nilai_akhir = 0;
            $nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->where('siswa_id', $anggota_kelas->id)->first();

            if (is_null($nilai)) {
                $pembelajaran->nilai_akhir = 0;
            } else {
                $pembelajaran->nilai_akhir = number_format((($nilai->sub1 + $nilai->sub2 + $nilai->ko1 + $nilai->ko2 + $nilai->praktik + $nilai->uts_uas) / 6), 1);

                // Menyimpan nilai untuk perhitungan total dan rata-rata
                $total_nilai_array[] = $pembelajaran->nilai_akhir;
            }
        }

        // Menghitung total nilai
        $total_nilai = array_sum($total_nilai_array);

        // Menghitung rata-rata nilai
        $count_nilai = count($total_nilai_array);
        if ($count_nilai > 0) {
            $rata_rata_nilai = number_format($total_nilai / $count_nilai, 1);
        }

        $raport = PDF::loadview('admin.raport.raport', compact('title', 'sekolah', 'anggota_kelas', 'data_id_mapel', 'data_pembelajaran', 'dateFormatted', 'total_siswa', 'total_nilai', 'rata_rata_nilai'));
        return $raport->stream('RAPORT ' . $anggota_kelas->nama_siswa . ' (' . $anggota_kelas->kelas->nama_kelas . ').pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
