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
            font-size: 15px;
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
                <h3>PELAKSANAAN PELAYANAN DAN REHABILITASI SOSIAL <br> SENTRA "BAHAGIA" DI MEDAN</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <table class="table table-borderless lh">
                    <tr>
                        <td class="w-200">Nama Penerima Bantuan</td>
                        <td>:</td>
                        <td>{{ $peserta }}</td>
                    </tr>
                    <tr>
                        <td class="w-200">No. Register/Program</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-200">Jenis Layanan</td>
                        <td>:</td>
                        <td>{{ $layanan }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <table class="table table-bordered table-stripped tableContent lh">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Layanan</th>
                            <th>Masalah Yang Dihadapi/Kebutuhan</th>
                            <th>Tindakan Yang Diberikan</th>
                            <th>Hasil</th>
                            <th>Rencana Tindak Lanjut</th>
                            <th>Tanda Tangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ date('d F Y H:i', strtotime($row->created_at)) }}</td>
                                <td>{{ $row->deskripsi_masalah }}</td>
                                <td>
                                    {{ $row->tindakan }}
                                    @if ($row->sub_layanan)
                                        <p style="margin-left: 10px;">* {{ $row->sub_layanan }}</p>
                                    @endif
                                </td>
                                <td>{{ $row->deskripsi_hasil }}</td>
                                <td>{{ $row->rencana_tindak_lanjut }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
