<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Guru';
        return view('admin.guru.index', [
            'gurus' => Guru::all()
        ], compact('title'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add this line for image validation
        ]);

        // Create a new User
        $user = new User([
            'username' => strtolower(str_replace(' ', '', $request->nama_guru)),
            'password' => bcrypt('123456'),
            'role' => 2,
        ]);

        $user->save();

        // Create a new Guru
        $guru = new Guru([
            'user_id' => $user->id,
            'nama_guru' => $request->nama_guru,
            'gelar' => $request->gelar,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
        ]);

        // Handle image upload for Guru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('guru');
            $guru->image = $imagePath; // Set the image path in the Guru model
        }

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
        $title = 'Detail Data Guru';
        return view('admin.guru.show', [
            'guru' => $guru
        ], compact('title'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validateData = $request->validate($rules);

        // Handle image update for Guru
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($guru->image) {
                Storage::delete($guru->image);
            }

            // Upload the new image and update the image path in the Guru model
            $imagePath = $request->file('image')->store('guru');
            $validateData['image'] = $imagePath;
        }

        Guru::where('id', $guru->id)->update($validateData);

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
        // Delete the image from storage if it exists
        if ($guru->image) {
            Storage::delete($guru->image);
        }

        Guru::destroy($guru->id);
        User::destroy($guru->user_id);

        return redirect('/admin/guru')->with('success', 'Guru berhasil dihapus');
    }
}
