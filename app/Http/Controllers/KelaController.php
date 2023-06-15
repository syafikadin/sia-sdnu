<?php

namespace App\Http\Controllers;

use App\Models\Kela;
use Illuminate\Http\Request;

class KelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kelas.index', [
            'kelas' => Kela::all()
        ]);
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
    public function show(Kela $kela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kela  $kela
     * @return \Illuminate\Http\Response
     */
    public function edit(Kela $Kela)
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
    public function update(Request $request, Kela $Kela)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kela  $Kela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kela $Kela)
    {
        //
    }
}
