<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Mata Pelajaran';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Mapel::where('tapel_id', $tapel->id)->orderBy('nama_mapel', 'ASC')->get();
        return view('admin.mapel.index', compact('title', 'tapel', 'data_mapel'));
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
     * @param  \App\Http\Requests\StoreMapelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tapel_id' => 'required',
            'nama_mapel' => 'required',
            'ringkasan' => 'required',
        ]);

        $mapel = new Mapel([
            'tapel_id' => $request->session()->get('tapel_id'),
            'nama_mapel' => $request->nama_mapel,
            'ringkasan' => $request->ringkasan,
        ]);

        $mapel->save($validateData);

        return redirect('/admin/mapel')->with('success', 'Mapel telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', [
            'mapel' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMapelRequest  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $rules = [
            'nama_mapel' => 'required',
            'ringkasan' => 'required',
        ];

        $validateData = $request->validate($rules);

        Mapel::where('id', $mapel->id)
            ->update($validateData);

        return redirect('/admin/mapel')->with('success', 'Data mapel telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        Mapel::destroy($mapel->id);

        return redirect('/admin/mapel')->with('success', 'Mapel berhasil dihapus');
    }
}
