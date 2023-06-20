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
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $user = new User([
            'username' => strtolower(str_replace(' ', '', $request->nama_guru)),
            'password' => bcrypt('123456'),
            'role' => 2,
        ]);

        $user->save();

        $guru = new Guru([
            'user_id' => $user->id,
            'nama_guru' => $request->nama_guru,
            'gelar' => $request->gelar,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        $guru->save($validateData);

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
        $rules = [
            'nama_guru' => 'required',
            'gelar' => 'nullable',
            'nip' => 'nullable',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ];

        $validateData = $request->validate($rules);

        Guru::where('id', $guru->id)
            ->update($validateData);

        return redirect('/admin/guru')->with('success', 'Data guru telah dirubah');
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
