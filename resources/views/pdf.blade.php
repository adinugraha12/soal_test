<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kependudukan</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            font-size: 10pt;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
            color: #333;
        }

        .header h3 {
            margin: 5px 0;
            font-size: 14pt;
            font-weight: normal;
            color: #666;
        }

        .header p {
            margin: 5px 0;
            font-size: 9pt;
            color: #888;
        }

        .info-box {
            margin-bottom: 20px;
            font-size: 9pt;
        }

        .info-box table {
            width: 100%;
        }

        .info-box td {
            padding: 3px 0;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data-table thead {
            background-color: #4CAF50;
            color: white;
        }

        table.data-table th {
            padding: 10px 5px;
            font-size: 9pt;
            font-weight: bold;
            text-align: left;
            border: 1px solid #ddd;
        }

        table.data-table td {
            padding: 8px 5px;
            font-size: 8pt;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        table.data-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table.data-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 9pt;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
            margin-right: 50px;
        }

        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 200px;
            display: inline-block;
        }

        .page-break {
            page-break-after: always;
        }

        @page {
            margin: 15mm;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h2>PEMERINTAH KABUPATEN SUKOHARJO</h2>
        <h3>LAPORAN DATA KEPENDUDUKAN</h3>
        <p>Jl. Pemuda No.1, Sukoharjo, Jawa Tengah</p>
    </div>

    <!-- Info Box -->
    <div class="info-box">
        <table>
            <tr>
                <td width="120">Tanggal Cetak</td>
                <td width="10">:</td>
                <td>{{ date('d F Y, H:i:s') }}</td>
            </tr>
            <tr>
                <td>Dicetak Oleh</td>
                <td>:</td>
                <td>{{ Auth::user()->name }} ({{ strtoupper(Auth::user()->role) }})</td>
            </tr>
            <tr>
                <td>Total Data</td>
                <td>:</td>
                <td>{{ count($kependudukan) }} Penduduk</td>
            </tr>
        </table>
    </div>

    <!-- Data Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="10%">NIK</th>
                <th width="12%">Nama</th>
                <th width="15%">Alamat</th>
                <th width="10%">Tempat Lahir</th>
                <th width="8%">Tgl Lahir</th>
                <th width="6%">JK</th>
                <th width="8%">Status</th>
                <th width="5%">Jml Sdr</th>
                <th width="8%">Agama</th>
                <th width="10%">Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($kependudukan as $p)
            <tr>
                <td style="text-align: center;">{{ $i++ }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->tmpt_lahir }}</td>
                <td>{{ date('d/m/Y', strtotime($p->tgl_lahir)) }}</td>
                <td style="text-align: center;">{{ $p->Jenis_Kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $p->Sts_Kawin }}</td>
                <td style="text-align: center;">{{ $p->Jumlah_Saudara }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->pendidikan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y, H:i:s') }} WIB</p>
    </div>

    <!-- Signature -->
    <div class="signature">
        <p>Sukoharjo, {{ date('d F Y') }}</p>
        <p style="margin-top: 5px;">Kepala Dinas Kependudukan</p>
        <div class="signature-line"></div>
        <p style="margin-top: 5px; font-weight: bold;">Nama Kepala Dinas</p>
        <p>NIP. 19XXXXXXXXXX</p>
    </div>
</body>
</html>