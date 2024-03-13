<?php

namespace App\Exports;

use App\Models\AnggotaKelas;
use App\Models\Nilai;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FormatImportNilaiExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Nilai::all();
    }

    protected $id;

    public function view(): View
    {
        $pembelajaran = Pembelajaran::findorfail($this->id);
        $data_anggota_kelas = AnggotaKelas::where('kelas_id', $pembelajaran->kelas_id)->get();

        return view('exports.formatImportNilai.formatImportNilai', compact('pembelajaran', 'data_anggota_kelas'));
    }
}
