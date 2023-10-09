@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="float-start">
                            Semua Data Penerima Bantuan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Peserta</th>
                                            <th>Anggota</th>
                                            <th>Jenis Bantuan</th>
                                            <th>Nominal Bantuan</th>
                                            <th>Tgl Terima Bantuan</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->peserta->nama_ppks }}</td>
                                                    <td>{{ $data->karyawan->nama }}</td>
                                                    <td>{{ $data->bantuan }}</td>
                                                    <td>Rp. {{ number_format($data->nominal_bantuan) }}</td>
                                                    <td>{{ date('d F Y', strtotime($data->tgl_pemberian)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
