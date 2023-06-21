<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Pembelajaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'syafik',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '1'
        ]);

        User::create([
            'username' => 'audy',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'udin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'adin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'khalista',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'adin2',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'khalista2',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        Admin::create([
            'user_id' => '1',
            'nama_admin' => 'Syafik'
        ]);

        Guru::create([
            'user_id' => '2',
            'nip' => '195',
            'nama_guru' => 'Audy Khalista',
            'gelar' => 'S.Kom.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2000-06-17',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Guru::create([
            'user_id' => '3',
            'nip' => '196',
            'nama_guru' => 'Mochammad Syafiuddin',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2000-06-16',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Siswa::create([
            'user_id' => '4',
            'kelas_id' => '1',
            'nis' => '205',
            'nama_siswa' => 'Raul Firmansyah',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Siswa::create([
            'user_id' => '5',
            'kelas_id' => '2',
            'nis' => '206',
            'nama_siswa' => 'Khalista Febrianti',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Siswa::create([
            'user_id' => '4',
            'kelas_id' => '1',
            'nis' => '207',
            'nama_siswa' => 'Adin Rodrygo',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Siswa::create([
            'user_id' => '5',
            'kelas_id' => '2',
            'nis' => '208',
            'nama_siswa' => 'Safira Audy',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Kelas::create([
            'guru_id' => '1',
            'nama_kelas' => '1A'
        ]);

        Kelas::create([
            'guru_id' => '2',
            'nama_kelas' => '2A'
        ]);

        Mapel::create([
            'nama_mapel' => 'Bahasa Indonesia',
            'ringkasan' => 'BI'
        ]);

        Mapel::create([
            'nama_mapel' => 'Matematika',
            'ringkasan' => 'MTK'
        ]);

        // Nilai::create([
        //     'pembelajaran_id' => '1',
        //     'anggota_kelas_id' => '1',
        //     'nilai_tugas' => 80,
        //     'nilai_ulangan' => 85
        // ]);

        Pembelajaran::create([
            'kelas_id' => '1',
            'mapel_id' => '1',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '2',
            'mapel_id' => '2',
            'guru_id' => '2'
        ]);

        // AnggotaKelas::create([
        //     'siswa_id' => '1',
        //     'kelas_id' => '1'
        // ]);

        // AnggotaKelas::create([
        //     'siswa_id' => '2',
        //     'kelas_id' => '1'
        // ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
