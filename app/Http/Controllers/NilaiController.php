<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Requests\UpdateNilaiRequest;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $guru = Guru::where('user_id', Auth::user()->id)->first();

        $data_anggota_kelas = Kelas::where('guru_id', $guru->id)->first();

        $data_penilaian = Pembelajaran::where('guru_id', $guru->id)->orderBy('mapel_id', 'ASC')->get();

        foreach ($data_penilaian as $penilaian) {
            $data_anggota_kelas = Siswa::where('kelas_id', $data_anggota_kelas->id)->get();
            $data_nilai = Nilai::where('pembelajaran_id', $penilaian->id)->get();

            $penilaian->jumlah_anggota_kelas = count($data_anggota_kelas);
            $penilaian->jumlah_telah_dinilai = count($data_nilai);
        }
        return view('guru.nilai.index', compact('data_penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);

        $data_anggota_kelas = Siswa::where('kelas_id', $pembelajaran->kelas_id)->get();

        $data_nilai = Nilai::where('pembelajaran_id', $pembelajaran->id)->get();

        if (count($data_nilai) == 0) {
            return view('guru.nilai.create', compact('pembelajaran', 'data_anggota_kelas'));
        } else {
            return view('guru.nilai.edit', compact('pembelajaran', 'data_nilai'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($count_siswa = 0; $count_siswa < count($request->siswa_id); $count_siswa++) {
            if ($request->nilai_tugas[$count_siswa] >= 0 && $request->nilai_tugas[$count_siswa] <= 100 || $request->nilai_ulangan[$count_siswa] >= 0 && $request->nilai_ulangan[$count_siswa] <= 100) {
                $data_nilai = array(
                    'pembelajaran_id'  => $request->pembelajaran_id,
                    'siswa_id'  => $request->siswa_id[$count_siswa],
                    'nilai_tugas'  => ltrim($request->nilai_tugas[$count_siswa]),
                    'nilai_ulangan'  => ltrim($request->nilai_ulangan[$count_siswa])
                );
                $data_nilai_siswa[] = $data_nilai;
            } else {
                return back()->with('toast_error', 'Nilai harus berisi antara 0 s/d 100');
            }
        }
        $store_data_nilai = $data_nilai_siswa;
        Nilai::insert($store_data_nilai);
        return redirect('guru/nilai')->with('toast_success', 'Data nilai berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        for ($count_siswa = 0; $count_siswa < count($request->siswa_id); $count_siswa++) {
            if ($request->nilai_tugas[$count_siswa] >= 0 && $request->nilai_tugas[$count_siswa] <= 100 || $request->nilai_ulangan[$count_siswa] >= 0 && $request->nilai_ulangan[$count_siswa] <= 100) {
                $nilai_sebelum = Nilai::where('pembelajaran_id', $nilai->id)->where('siswa_id', $request->siswa_id[$count_siswa])->first();

                $data_nilai = [
                    'nilai_tugas'  => $request->nilai_tugas[$count_siswa],
                    'nilai_ulangan'  => $request->nilai_ulangan[$count_siswa],
                ];

                Nilai::where('id', $nilai_sebelum->id)->update($data_nilai);
            } else {
                return back()->with('toast_error', 'Nilai harus berisi antara 0 s/d 100');
            }
        }
        return redirect('guru/nilai')->with('toast_success', 'Data nilai berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
