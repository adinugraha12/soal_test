@extends('template')

@section('content')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMROGRAMAN WEBSITE</title>

    <body style="display: flex; align-items: center;">
        <img src="http://portal.sukoharjokab.go.id/wp-content/uploads/2018/01/logo-fix.png"
             alt="Logo Kabupaten Sukoharjo"
             style="width: 100px; display: inline-block;">
        <div style="display: inline-block; margin-left: 10px;">
            <h4 style="margin: 0; padding: 0;">SITUS KEPENDUDUKAN KABUPATEN SUKOHARJO</h4>
            <h5 style="margin: 0; padding: 0;">DINAS KEPENDUDUKAN DAN CATATAN SIPIL</h5>
            <h6 style="margin: 0; padding: 0;">Pemerintah Kabupaten Sukoharjo</h6>
        </div>
    </body>

    <div class="my-3">
        @if(Auth::user()->role === 'admin')
            <a href="/tambah" class="btn btn-info">Penduduk Baru</a>
        @endif
        <a href="/kependudukan/cetak_pdf" target="_blank" class="btn btn-warning">CETAK PDF</a>
        <a href="/kependudukan/export_excel" target="_blank" class="btn btn-success">EXPORT EXCEL</a>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead style="background-color: yellow;">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status Kawin</th>
                <th>Jumlah Saudara</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                @if(Auth::user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $kependudukan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kependudukan->nik }}</td>
                    <td>{{ $kependudukan->nama }}</td>
                    <td>{{ $kependudukan->alamat }}</td>
                    <td>{{ $kependudukan->tmpt_lahir }}</td>
                    <td>{{ $kependudukan->tgl_lahir }}</td>
                    <td>{{ $kependudukan->Jenis_Kelamin }}</td>
                    <td>{{ $kependudukan->Sts_Kawin }}</td>
                    <td>{{ $kependudukan->Jumlah_Saudara }}</td>
                    <td>{{ $kependudukan->agama }}</td>
                    <td>{{ $kependudukan->pendidikan }}</td>

                    @if(Auth::user()->role === 'admin')
                        <td>
                            <a href="/kependudukan/ubah/{{ $kependudukan->nik }}"
                               class="btn btn-warning btn-sm">Edit</a>
                            <a href="/hapus/{{ $kependudukan->nik }}"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                               Hapus
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
