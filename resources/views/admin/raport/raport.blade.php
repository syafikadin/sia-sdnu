<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>{{$title}} | {{$anggota_kelas->nama_lengkap}} ({{$anggota_kelas->nis}})</title>
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
              <td style="width: 13%;">: {{$anggota_kelas->kelas->nama_kelas}}</td>
            </tr>
            <tr>
              <td style="width: 19%;">Alamat</td>
              <td style="width: 52%;">: {{ $sekolah->alamat }}</td>
              <td style="width: 16%;">Semester</td>
              <td style="width: 13%;">:
                @if($anggota_kelas->kelas->tapel->semester == 1)
                1 (Ganjil)
                @else
                2 (Genap)
                @endif
              </td>
            </tr>
            <tr>
              <td style="width: 19%;">Nama Peserta Didik</td>
              <td style="width: 52%;">: {{$anggota_kelas->nama_siswa}} </td>
              <td style="width: 16%;">Tahun Pelajaran</td>
              <td style="width: 13%;">: {{$anggota_kelas->kelas->tapel->tahun_pelajaran}}</td>
            </tr>
            <tr>
              <td style="width: 19%;">Nomor Induk/NISN</td>
              <td style="width: 52%;">: {{$anggota_kelas->nis}} </td>
            </tr>
        </table>
    </div>

    <div class="content">
        <h3>
          <strong>
            LAPORAN HASIL BELAJAR<br>
            @if($anggota_kelas->kelas->tapel->semester == 1)
            GANJIL
            @else
            GENAP
            @endif
            <br>
            TAHUN PELAJARAN {{$anggota_kelas->kelas->tapel->tahun_pelajaran}}
          </strong>
        </h3>
        <table cellspacing="0" style="padding-top: 5px;">
          <tr class="heading">
            <td rowspan="2" style="width: 5%;">NO</td>
            <td rowspan="2" style="width: 43%;">Mata Pelajaran</td>
            <td rowspan="2" style="width: 7%;">KKM</td>
            <td colspan="4" style="width: 45%;">Nilai</td>
          </tr>
          <tr class="heading">
            <td style="width: 15%;">KO1</td>
            <td style="width: 15%;">KO2</td>
            <td style="width: 15%;">SUB1</td>
            <td style="width: 15%;">SUB2</td>
          </tr>
  
          <?php $no = 0; ?>
          @foreach($data_pembelajaran as $pembelajaran)
          <?php $no++; ?>
          <tr class="nilai">
            <td class="center">{{$no}}</td>
            <td>{{$pembelajaran->mapel->nama_mapel}}</td>
            <td class="center">70</td>
            <td class="center">{{$pembelajaran->nilai_ko1}}</td>
            <td class="center">{{$pembelajaran->nilai_ko2}}</td>
            <td class="center">{{$pembelajaran->nilai_sub1}}</td>
            <td class="center">{{$pembelajaran->nilai_sub2}}</td>
          </tr>
          @endforeach
  
        </table>
      </div>

  </div>
</body>

</html>