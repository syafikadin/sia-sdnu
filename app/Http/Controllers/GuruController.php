<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\User;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.guru.index', [
            'gurus' => Guru::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        $user = new User([
            'username' => str_replace(' ', '', $request->nama . $request->nik),
            'password' => bcrypt('123456'),
            'role' => 2,
        ]);
        $user->save();

        $guru = new Guru([
            'user_id' => $user->id,
            'nik' => $request->nik,
            'nama' => strtoupper($request->nama),
        ]);
        $guru->save($validateData);

        // $validateData['user_id'] = auth()->user()->id;

        // Guru::create($validateData);

        return redirect('/admin/guru')->with('success', 'Guru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.show', [
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuruRequest  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        Guru::destroy($guru->id);
        User::destroy($guru->user_id);

        return redirect('/admin/guru')->with('success', 'Guru berhasil dihapus');
    }
}
