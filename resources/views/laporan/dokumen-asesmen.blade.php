<!DOCTYPE html>
<html lang="en">

<head>
    <link class="js-stylesheet" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Laporan Residensial</title>
    <style>
        .lh {
            line-height: 1.5 !important;
        }

        .w-200 {
            width: 200px !important;
        }

        .tableContent {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .tableContent th,
        .tableContent td {
            border: 1px solid #000000;
        }
    </style>
</head>

<body class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>LAPORAN ASESMEN</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <table class="table table-borderless">
                    <tr>
                        <td class="w-200">Jenis Laporan</td>
                        <td>:</td>
                        <td>{{ $jenis_laporan }}</td>
                    </tr>
                    <tr>
                        <td class="w-200">Tanggal Laporan</td>
                        <td>:</td>
                        <td>{{ date('d F Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <table class="table table-bordered table-stripped tableContent lh">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama PPKS</th>
                            <th>NIK</th>
                            <th>Nomor KK</th>
                            <th>Tempat, Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat Saat Ini</th>
                            <th>Pekerjaan Saat Ini</th>
                            <th>Penghasil Perbulan</th>
                            <th>No HP Yang Bisa Digubungi</th>
                            <th>Jenis Bantuan</th>
                            <th>Nominal Bantuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $row->nama_ppks }}</td>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->no_kk }}</td>
                                <td>{{ $row->tempat_lahir }}, {{ date('d F Y', strtotime($row->tgl_lahir)) }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->agama }}</td>
                                <td>{{ $row->alamat_domisili }}</td>
                                <td>{{ $row->pekerjaan }}</td>
                                <td>Rp. {{ number_format($row->penghasilan_per_bulan) }}</td>
                                <td>{{ $row->no_hp_wali }}</td>
                                <td>{{ $row->bantuan }}</td>
                                <td>Rp. {{ number_format($row->nominal_bantuan) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
