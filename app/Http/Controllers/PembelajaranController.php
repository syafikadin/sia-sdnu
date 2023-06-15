<?php

namespace App\Http\Controllers;

use App\Models\Pembelajaran;
use App\Http\Requests\StorePembelajaranRequest;
use App\Http\Requests\UpdatePembelajaranRequest;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePembelajaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembelajaranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelajaran $pembelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelajaran $pembelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelajaranRequest  $request
     * @param  \App\Models\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelajaranRequest $request, Pembelajaran $pembelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelajaran $pembelajaran)
    {
        //
    }
}
