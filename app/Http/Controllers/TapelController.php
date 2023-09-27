<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Tahun Pelajaran';
        $tapels = Tapel::all();

        return view('admin.tapel.index', compact('title', 'tapels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'tahun_pelajaran' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);

        $tapel = new Tapel([
            'tahun_pelajaran' => $request->tahun_pelajaran,
            'semester' => $request->semester,
        ]);

        $tapel->save($validateData);
        Siswa::query()->update(['kelas_id' => null]);

        return redirect('/admin/tapel')->with('success', 'Tahun Pelajaran telah ditambahkan');
    }
}
