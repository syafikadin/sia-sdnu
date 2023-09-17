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
        $validator = Validator::make($request->all(), [
            'tahun_pelajaran' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('addError', 'Harap isi dengan sesuai');
        } else {
            $tapel = new Tapel([
                'tahun_pelajaran' => $request->tahun_pelajaran,
                'semester' => $request->semester,
            ]);
            $tapel->save();
            Siswa::query()->update(['kelas_id' => null]);
            return back()->with('addSuccess', 'Tahun Pelajaran berhasil ditambahkan');
        }
    }
}
