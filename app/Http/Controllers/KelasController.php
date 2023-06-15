<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

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
     * @param  \App\Http\Requests\StoreKelaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kela  $kela
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kela  $kela
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $Kela)
    {
        return $Kela;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelaRequest  $request
     * @param  \App\Models\Kela  $Kela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $Kela)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kela  $Kela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $Kela)
    {
        //
    }
}
