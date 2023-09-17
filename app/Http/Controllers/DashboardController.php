<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Pembelajaran;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        if (Auth::user()->role == 1) {
            $jumlah_guru = Guru::all()->count();
            $jumlah_siswa = Siswa::all()->count();
            $jumlah_kelas = Kelas::where('tapel_id', $tapel->id)->count();

            return view('admin.index', compact(
                'title',
                'tapel',
                'jumlah_guru',
                'jumlah_siswa',
                'jumlah_kelas',
            ));
        } elseif (Auth::user()->role == 2) {
            $guru = Guru::where('user_id', Auth::user()->id)->first();

            $id_kelas = Kelas::all();

            $data_anggota_kelas = count(Pembelajaran::where('guru_id', $guru->id)->get());

            $data_capaian_penilaian = Pembelajaran::where('guru_id', $guru->id)->get();

            foreach ($data_capaian_penilaian as $penilaian) {
                $nilai = Nilai::where('pembelajaran_id', $penilaian->id)->get();
                $penilaian->$nilai = count($nilai);

                $penilaian->jumlah_telah_dinilai = count($nilai);
            }

            return view('guru.index', compact(
                'title',
                'tapel',
                'data_anggota_kelas',
                'data_capaian_penilaian'
            ));
        } elseif (Auth::user()->role == 3) {

            // $siswa = Siswa::where('user_id', Auth::user()->id)->first();

            // $data_id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

            // $anggota_kelas = AnggotaKelas::whereIn('kelas_id', $data_id_kelas)->where('siswa_id', $siswa->id)->first();
            // if (is_null($anggota_kelas)) {
            //     $jumlah_ekstrakulikuler = '-';
            //     $jumlah_mapel = '-';
            // } else {
            //     $jumlah_ekstrakulikuler = AnggotaEkstrakulikuler::where('anggota_kelas_id', $anggota_kelas->id)->whereIn('ekstrakulikuler_id', $data_id_ekstrakulikuler)->count();
            //     $jumlah_mapel = Pembelajaran::where('kelas_id', $anggota_kelas->kelas->id)->where('status', 1)->count();
            // }

            // return view('dashboard.siswa', compact(
            //     'title',
            //     'data_pengumuman',
            //     'data_riwayat_login',
            //     'sekolah',
            //     'tapel',
            //     'jumlah_ekstrakulikuler',
            //     'jumlah_mapel',
            // ));
        }
    }
}
