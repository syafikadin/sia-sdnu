<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }} | {{ $anggota_kelas->nama_siswa }} ({{ $anggota_kelas->nis }})</title>
    <link href="./assets/invoice_raport.css" rel="stylesheet">
</head>

<body>
    <div class="invoice-box">
        <div class="header">
            <table>
                <tr>
                    <td style="width: 19%;">Nama Sekolah</td>
                    <td style="width: 52%;">: {{ $sekolah->nama_sekolah }}</td>
                    <td style="width: 16%;">Kelas</td>
                    <td style="width: 13%;">: {{ $anggota_kelas->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <td style="width: 19%;">Alamat</td>
                    <td style="width: 52%;">: {{ $sekolah->alamat }}</td>
                    <td style="width: 16%;">Semester</td>
                    <td style="width: 13%;">:
                        @if ($anggota_kelas->kelas->tapel->semester == 1)
                            1 (Ganjil)
                        @else
                            2 (Genap)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width: 19%;">Nama Peserta Didik</td>
                    <td style="width: 52%;">: {{ $anggota_kelas->nama_siswa }} </td>
                    <td style="width: 16%;">Tahun Pelajaran</td>
                    <td style="width: 13%;">: {{ $anggota_kelas->kelas->tapel->tahun_pelajaran }}</td>
                </tr>
                <tr>
                    <td style="width: 19%;">Nomor Induk/NISN</td>
                    <td style="width: 52%;">: {{ $anggota_kelas->nis }} </td>
                </tr>
            </table>
        </div>

        <div class="content">
            <h3>
                <strong>
                    LAPORAN HASIL BELAJAR<br>
                    SEMESTER
                    @if ($anggota_kelas->kelas->tapel->semester == 1)
                        GANJIL
                    @else
                        GENAP
                    @endif
                    <br>
                    TAHUN PELAJARAN {{ $anggota_kelas->kelas->tapel->tahun_pelajaran }}
                </strong>
            </h3>
            <table cellspacing="0" style="padding-top: 5px;">
                <tr class="heading">
                    <td rowspan="2" style="width: 5%;">NO</td>
                    <td rowspan="2" style="width: 45%;">Mata Pelajaran</td>
                    <td colspan="2" style="width: 50%;">Nilai</td>
                </tr>
                <tr class="heading">
                    <td style="width: 20%;">Prestasi</td>
                    <td style="width: 20%;">Rata-Rata Kelas</td>
                </tr>

                <?php
                $no = 0;
                ?>
                @foreach ($data_pembelajaran as $pembelajaran)
                    <?php
                    $no++;
                    ?>
                    <tr class="nilai">
                        <td class="center">{{ $no }}</td>
                        <td>{{ $pembelajaran->mapel->nama_mapel }}</td>
                        <td class="center">{{ $pembelajaran->nilai_akhir }}</td>
                        <td class="center">{{ $pembelajaran->rata_kelas }}</td>
                    </tr>
                @endforeach

                <tr class="heading">
                    <td colspan="2">Jumlah</td>
                    <td>{{ $total_nilai }}</td>
                    <td></td>
                </tr>

                <tr class="heading">
                    <td colspan="2">Rata - rata</td>
                    <td>{{ $rata_rata_nilai }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="4"></td>
                </tr>

                <tr class="nilai">
                    <td colspan="2">Prestasi / ranking dari {{ $total_siswa }} anak</td>
                    <td colspan="2">Ke ...</td>
                </tr>

                <tr>
                    <td colspan="4"></td>
                </tr>

                <tr class="nilai">
                    <td colspan="2">Nama dan Tanda Tangan Wali Kelas</td>
                    <td style="height: 80px" colspan="2"></td>
                </tr>

                <tr class="nilai">
                    <td colspan="2">Nama dan Tanda Tangan Orang Tua</td>
                    <td style="height: 80px" colspan="2"></td>
                </tr>

            </table>
        </div>

        <div
            style="padding-left:60%; padding-top:1rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Kepanjen, {{ $dateFormatted }}<br>
            Kepala Sekolah, <br><br><br><br><br>
            <b><u>{{ $sekolah->kepala_sekolah }}</u></b><br>
            NIP. {{ $sekolah->nip_kepala_sekolah ? $sekolah->nip_kepala_sekolah : '' }}
        </div>

    </div>
</body>

</html>
