<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Siswa;
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
            'username' => 'ody',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'adin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        Admin::create([
            'user_id' => '1',
            'nama' => 'Syafik'
        ]);

        Guru::create([
            'user_id' => '2',
            'nik' => '195',
            'nama' => 'Ody',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'
        ]);

        Kelas::create([
            'guru_id' => '1',
            'nama_kelas' => '1A'
        ]);

        Siswa::create([
            'user_id' => '3',
            'kelas_id' => '1',
            'nis' => '185',
            'nama' => 'Adin',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Jl. Sultan Agung'

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
