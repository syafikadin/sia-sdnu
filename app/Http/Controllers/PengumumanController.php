<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Pengumuman';
        $data_pengumuman = Pengumuman::all();
        return view('admin.pengumuman.index', compact('title', 'data_pengumuman'));
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
     * @param  \App\Http\Requests\StorePengumumanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengumuman = new Pengumuman([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        $pengumuman->save($validateData);

        return redirect('/admin/pengumuman')->with('success', 'Data pengumuman telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengumumanRequest  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $rules = [
            'judul' => 'required',
            'isi' => 'required',
        ];

        $validateData = $request->validate($rules);

        Pengumuman::where('id', $pengumuman->id)
            ->update($validateData);

        return redirect('/admin/pengumuman')->with('success', 'Data pengumuman telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);

        return redirect('/admin/pengumuman')->with('success', 'Pengumuman berhasil dihapus');
    }
}
