<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Siswa';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $jumlah_kelas = Kelas::where('tapel_id', $tapel->id)->count();

        if ($jumlah_kelas == 0) {
            return redirect('admin/kelas')->with('error', 'Mohon Isikan Data Kelas');
            // return redirect('/admin/kelas')->with('success', 'Data siswa telah dirubah');
        } else {
            $data_kelas = Kelas::all();
            $data_siswa = Siswa::all();
            return view('admin.siswa.index', compact('title', 'data_siswa', 'data_kelas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required|numeric',
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this line for image validation
        ]);

        if (!$validateData) {
            return back()->with('toast_error', $validateData->messages()->all()[0])->withInput();
        } else {
            $user = new User([
                'username' => strtolower(str_replace(' ', '', $request->nama_siswa . $request->nis)),
                'password' => bcrypt('123456'),
                'role' => 3,
            ]);

            $user->save();
        }

        $siswa = new Siswa([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        // Handle image upload for Siswa
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('siswa');
            $siswa->image = $imagePath; // Set the image path in the Siswa model
        }

        $siswa->save($validateData);

        $anggota_kelas = new AnggotaKelas([
            'siswa_id' => $siswa->id,
            'kelas_id' => $request->kelas_id,
        ]);
        $anggota_kelas->save();

        return redirect('/admin/siswa')->with('success', 'Siswa telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $title = 'Data Detail Siswa';
        return view('admin.siswa.show', [
            'siswa' => $siswa
        ], compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $rules = [
            'nis' => 'required|numeric',
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validateData = $request->validate($rules);

        // Handle image update for Siswa
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($siswa->image) {
                Storage::delete($siswa->image);
            }

            // Upload the new image and update the image path in the siswa model
            $imagePath = $request->file('image')->store('siswa');
            $validateData['image'] = $imagePath;
        }

        Siswa::where('id', $siswa->id)
            ->update($validateData);

        return redirect('/admin/siswa')->with('success', 'Data siswa telah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        User::destroy($siswa->user_id);

        return redirect('/admin/siswa')->with('success', 'Siswa berhasil dihapus');
    }
}
