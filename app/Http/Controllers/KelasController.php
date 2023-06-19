<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kelas = Kelas::all();
        foreach ($data_kelas as $kelas) {
            $jumlah_anggota = Siswa::where('kelas_id', $kelas->id)->count();
            $kelas->jumlah_anggota = $jumlah_anggota;
        }
        return view('admin.kelas.index', compact('data_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        return view('admin.kelas.edit', [
            'kela' => $kela,
            'gurus' => Guru::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelaRequest  $request
     * @param  \App\Models\Kelas  $Kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        Validator::make($request->all(), [
            'nama_kelas' => 'required|min:1|max:30',
            'guru_id' => 'required',
        ]);

        $kelas = Kelas::findorfail($kela);
        $data_kelas = [
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
        ];
        $kelas->update($data_kelas);
        // return back()->with('toast_success', 'Kelas berhasil diedit');

        return redirect('/admin/kelas')->with('success', 'Kelas has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $Kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $Kela)
    {
        //
    }
}
