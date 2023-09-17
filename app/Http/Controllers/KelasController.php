<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Tapel;
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
        $title = 'Data Kelas';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Mapel::where('tapel_id', $tapel->id)->get();
        if (count($data_mapel) == 0) {
        } else {
            $data_guru = Guru::orderBy('nama_guru', 'ASC')->get();
            $data_kelas = Kelas::where('tapel_id', $tapel->id)->get();
            foreach ($data_kelas as $kelas) {
                $jumlah_anggota = Siswa::where('kelas_id', $kelas->id)->count();
                $kelas->jumlah_anggota = $jumlah_anggota;
            }
        }
        return view('admin.kelas.index', compact('title', 'title', 'data_kelas', 'data_guru'));
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
        $validateData = $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
        ]);

        if (!$validateData) {
            return back()->with('toast_error', $validateData->messages()->all()[0])->withInput();
        }

        $kelas = new Kelas([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
        ]);

        $kelas->save($validateData);

        return redirect('/admin/kelas')->with('success', 'Kelas telah ditambahkan');
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
        $rules = [
            'nama_kelas' => 'required',
            'guru_id' => 'required',
        ];

        $validateData = $request->validate($rules);

        Kelas::where('id', $kela->id)
            ->update($validateData);

        return redirect('/admin/kelas')->with('success', 'Data kelas telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $Kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);

        return redirect('/admin/kelas')->with('success', 'Kelas berhasil dihapus');
    }
}
