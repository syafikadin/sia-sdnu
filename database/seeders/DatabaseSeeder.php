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
use App\Models\Sekolah;
use App\Models\Tapel;
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

        Sekolah::create([
            'nama_sekolah' => 'SDNU Kepanjen',
            'npsn' => '20537316',
            'nss' => '104051821044',
            'kode_pos' => '65163',
            'nomor_telpon' => '0341 - 396408',
            'alamat' => 'Jl. Sultan Agung 71 Kepanjen Malang',
            'website' => 'http://sia-sdnu.sch.id',
            'email' => 'sdnu@gmail.com',
            'kepala_sekolah' => 'AINIA ROSYIDAH, S.Pd',
        ]);
        // role
        // 1 admin
        // 2 guru
        // 3 siswa

        User::create([
            'username' => 'syafik',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '1'
        ]);

        User::create([
            'username' => 'ainiarosyidah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'yuliastuti',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'agusbudiono',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'mudayati',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'edisantoso',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'ainulyaqin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'masruroh',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'ariemustofa',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'khoridah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'noeroelsoehita',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'aliaturrofiah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'henyfitri',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'zumrotulmufida',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'ikhwanjihad',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'sitimardhiyah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'nurindrawati',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'alfonitazakiya',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'dandyakbar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '2'
        ]);

        User::create([
            'username' => 'mochammadsyafiuddin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'audykhalista',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'nurilakbar',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'nicosudibyo',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'rafiabbyan',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'yudhapamungkas',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'fadwanazirah',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'naufalzuhdi',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'hedara',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'agungbudi',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'mariaastrid',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'oktanugroho',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'febyputri',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'agilgunawan',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'firdazuhrotul',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'roisulumam',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'pahlevydani',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'khalistafebrianti',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'pandusurya',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'hasansyaifur',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'ilhamramadhan',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'elsaaulia',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'hanifatulizza',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        User::create([
            'username' => 'dianayu',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => '3'
        ]);

        Admin::create([
            'user_id' => '1',
            'nama_admin' => 'Syafik'
        ]);

        Guru::create([
            'user_id' => '2',
            'nip' => '101',
            'nama_guru' => 'Ainia Rosyidah',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '1982-03-14',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '3',
            'nip' => '102',
            'nama_guru' => 'Yuli Astuti',
            'gelar' => 'Dra',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1964-07-18',
            'alamat' => 'Trenggalek'
        ]);

        Guru::create([
            'user_id' => '4',
            'nip' => '103',
            'nama_guru' => 'Agus Budiono',
            'gelar' => 'S.Ag.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '1970-08-06',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '5',
            'nip' => '104',
            'nama_guru' => 'Mudayati',
            'gelar' => 'S.Ag.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1972-05-02',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '6',
            'nip' => '105',
            'nama_guru' => 'Edi Santoso',
            'gelar' => 'S.Ag.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1972-05-02',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '7',
            'nip' => '106',
            'nama_guru' => 'Ainul Yaqin',
            'gelar' => 'S.Ag.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '1975-01-04',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '8',
            'nip' => '107',
            'nama_guru' => 'Masruroh',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1976-04-25',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '9',
            'nip' => '108',
            'nama_guru' => 'Arie Mustofa',
            'gelar' => 'S.Si.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1983-01-22',
            'alamat' => 'Gresik'
        ]);

        Guru::create([
            'user_id' => '10',
            'nip' => '109',
            'nama_guru' => 'Khoridah',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1982-03-05',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '11',
            'nip' => '110',
            'nama_guru' => 'Noeroel Soehita Dewi',
            'gelar' => 'Dra.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1966-11-27',
            'alamat' => 'Madiun'
        ]);

        Guru::create([
            'user_id' => '12',
            'nip' => '111',
            'nama_guru' => 'Aliatur Rofiah',
            'gelar' => 'S.Pdl.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1984-03-09',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '13',
            'nip' => '112',
            'nama_guru' => 'Heny Fitri Yunita',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1985-06-22',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '14',
            'nip' => '113',
            'nama_guru' => 'Zumrotul Mufida',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1991-02-14',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '15',
            'nip' => '114',
            'nama_guru' => 'Ikhwan Jihaduddin',
            'gelar' => 'S.Pdl.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '1984-11-30',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '16',
            'nip' => '115',
            'nama_guru' => 'Siti Mardhiyah',
            'gelar' => 'S.E.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1992-11-11',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '17',
            'nip' => '116',
            'nama_guru' => 'Nur Indrawati',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1972-05-02',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '18',
            'nip' => '117',
            'nama_guru' => 'Alfonita Sayidhati Zakiya',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '1997-02-21',
            'alamat' => 'Malang'
        ]);

        Guru::create([
            'user_id' => '19',
            'nip' => '118',
            'nama_guru' => 'Dandy Akbar Irawan',
            'gelar' => 'S.Pd.',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '1999-08-07',
            'alamat' => 'Malang'
        ]);

        Siswa::create([
            'user_id' => '20',
            'kelas_id' => '1',
            'nis' => '201',
            'nama_siswa' => 'Mochammad Syafiuddin',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2000-04-19',
            'alamat' => 'Kepanjen'
        ]);

        Siswa::create([
            'user_id' => '21',
            'kelas_id' => '1',
            'nis' => '202',
            'nama_siswa' => 'Audy Khalista',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2000-06-16',
            'alamat' => 'Solo'
        ]);

        Siswa::create([
            'user_id' => '22',
            'kelas_id' => '2',
            'nis' => '203',
            'nama_siswa' => 'Muhammad Nuril Akbar',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-04-19',
            'alamat' => 'Stasiun'
        ]);

        Siswa::create([
            'user_id' => '23',
            'kelas_id' => '2',
            'nis' => '204',
            'nama_siswa' => 'Nico Sudibyo',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2010-02-15',
            'alamat' => 'Pasar'
        ]);

        Siswa::create([
            'user_id' => '24',
            'kelas_id' => '3',
            'nis' => '205',
            'nama_siswa' => 'Rafi Abbyan',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2009-01-05',
            'alamat' => 'Effendi'
        ]);

        Siswa::create([
            'user_id' => '25',
            'kelas_id' => '3',
            'nis' => '206',
            'nama_siswa' => 'Yudha Pamungkas',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2008-03-11',
            'alamat' => 'Jombang'
        ]);

        Siswa::create([
            'user_id' => '26',
            'kelas_id' => '4',
            'nis' => '207',
            'nama_siswa' => 'Fadwa Nazirah',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2007-02-01',
            'alamat' => 'Tangerang'
        ]);

        Siswa::create([
            'user_id' => '27',
            'kelas_id' => '4',
            'nis' => '208',
            'nama_siswa' => 'Naufal Zuhdi',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2006-12-11',
            'alamat' => 'Banurejo'
        ]);

        Siswa::create([
            'user_id' => '28',
            'kelas_id' => '5',
            'nis' => '209',
            'nama_siswa' => 'Hedara',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2005-05-09',
            'alamat' => 'Mojokerto'
        ]);

        Siswa::create([
            'user_id' => '29',
            'kelas_id' => '5',
            'nis' => '210',
            'nama_siswa' => 'Agung Budi',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2004-06-10',
            'alamat' => 'Pujon'
        ]);

        Siswa::create([
            'user_id' => '30',
            'kelas_id' => '6',
            'nis' => '211',
            'nama_siswa' => 'Maria Astrid',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2003-04-06',
            'alamat' => 'Mojokerto'
        ]);

        Siswa::create([
            'user_id' => '31',
            'kelas_id' => '6',
            'nis' => '212',
            'nama_siswa' => 'Okta Nugroho',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2002-03-10',
            'alamat' => 'Cempokomulyo'
        ]);

        Siswa::create([
            'user_id' => '32',
            'kelas_id' => '7',
            'nis' => '213',
            'nama_siswa' => 'Feby Putri',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2001-11-16',
            'alamat' => 'Jateng'
        ]);

        Siswa::create([
            'user_id' => '33',
            'kelas_id' => '7',
            'nis' => '214',
            'nama_siswa' => 'Agil Gunawan',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2000-10-11',
            'alamat' => 'Sawunggaling'
        ]);

        Siswa::create([
            'user_id' => '34',
            'kelas_id' => '8',
            'nis' => '215',
            'nama_siswa' => 'Firda Zuhrotul',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2004-12-06',
            'alamat' => 'Solobekiti'
        ]);

        Siswa::create([
            'user_id' => '35',
            'kelas_id' => '8',
            'nis' => '216',
            'nama_siswa' => 'Roisul Umam',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2005-11-01',
            'alamat' => 'Ardirejo'
        ]);

        Siswa::create([
            'user_id' => '36',
            'kelas_id' => '9',
            'nis' => '217',
            'nama_siswa' => 'Pahlevi Dani',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2006-09-16',
            'alamat' => 'Ardirejo'
        ]);

        Siswa::create([
            'user_id' => '37',
            'kelas_id' => '9',
            'nis' => '218',
            'nama_siswa' => 'Khalista Febrianti',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2007-04-04',
            'alamat' => 'Jakarta'
        ]);

        Siswa::create([
            'user_id' => '38',
            'kelas_id' => '10',
            'nis' => '219',
            'nama_siswa' => 'Pandu Surya',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2008-08-06',
            'alamat' => 'Trenggalek'
        ]);

        Siswa::create([
            'user_id' => '39',
            'kelas_id' => '10',
            'nis' => '220',
            'nama_siswa' => 'Hasan Syaifur',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2009-07-14',
            'alamat' => 'Banyuwangi'
        ]);

        Siswa::create([
            'user_id' => '40',
            'kelas_id' => '11',
            'nis' => '221',
            'nama_siswa' => 'Ilham Ramadhan',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2010-02-09',
            'alamat' => 'Turen'
        ]);

        Siswa::create([
            'user_id' => '41',
            'kelas_id' => '11',
            'nis' => '222',
            'nama_siswa' => 'Elsa Auliya',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2011-09-19',
            'alamat' => 'Blitar'
        ]);

        Siswa::create([
            'user_id' => '42',
            'kelas_id' => '12',
            'nis' => '223',
            'nama_siswa' => 'Hanifatul Izza',
            'jenis_kelamin' => false,
            'tanggal_lahir' => '2012-09-08',
            'alamat' => 'Trenggalek'
        ]);

        Siswa::create([
            'user_id' => '43',
            'kelas_id' => '12',
            'nis' => '224',
            'nama_siswa' => 'Dian Ayu',
            'jenis_kelamin' => true,
            'tanggal_lahir' => '2011-03-12',
            'alamat' => 'Mojokerto'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '1A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '2',
            'nama_kelas' => '1B'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '2A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '2',
            'nama_kelas' => '2B'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '3A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '2',
            'nama_kelas' => '3B'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '4A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '2',
            'nama_kelas' => '4B'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '5A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '5B'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '1',
            'nama_kelas' => '6A'
        ]);

        Kelas::create([
            'tapel_id' => '1',
            'guru_id' => '2',
            'nama_kelas' => '6B'
        ]);

        Mapel::create([
            'tapel_id' => '1',
            'nama_mapel' => 'Bahasa Indonesia',
            'ringkasan' => 'BI'
        ]);

        Mapel::create([
            'tapel_id' => '1',
            'nama_mapel' => 'Matematika',
            'ringkasan' => 'MTK'
        ]);

        Mapel::create([
            'tapel_id' => '1',
            'nama_mapel' => 'Bahasa Inggris',
            'ringkasan' => 'BING'
        ]);

        Mapel::create([
            'tapel_id' => '1',
            'nama_mapel' => 'Ilmu Pengetahuan Alam',
            'ringkasan' => 'IPA'
        ]);

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

        Pembelajaran::create([
            'kelas_id' => '3',
            'mapel_id' => '3',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '4',
            'mapel_id' => '4',
            'guru_id' => '2'
        ]);

        Pembelajaran::create([
            'kelas_id' => '5',
            'mapel_id' => '1',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '6',
            'mapel_id' => '2',
            'guru_id' => '2'
        ]);

        Pembelajaran::create([
            'kelas_id' => '7',
            'mapel_id' => '3',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '8',
            'mapel_id' => '4',
            'guru_id' => '2'
        ]);

        Pembelajaran::create([
            'kelas_id' => '9',
            'mapel_id' => '1',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '10',
            'mapel_id' => '2',
            'guru_id' => '2'
        ]);

        Pembelajaran::create([
            'kelas_id' => '11',
            'mapel_id' => '3',
            'guru_id' => '1'
        ]);

        Pembelajaran::create([
            'kelas_id' => '12',
            'mapel_id' => '4',
            'guru_id' => '2'
        ]);

        Tapel::create([
            'tahun_pelajaran' => '2020/2021',
            'semester' => '1',
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
