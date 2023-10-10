@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Data Laporan Terminasil</h3>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: -30px;">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Peserta</th>
                                            <th>Jenis Tindakan</th>
                                            <th>Tgl Terminasi</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->peserta->nama_ppks }}</td>
                                                    <td>{{ $data->tindakan }}</td>
                                                    <td>{{ date('d F Y', strtotime($data->tgl_terminasi)) }}</td>
                                                    <td>
                                                        <a href="{{ route('dokumen-terminasi', $data->id) }}"
                                                            target="_blank" class="btn btn-success btn-sm">
                                                            <i class="align-middle" data-feather="download"></i> Form
                                                            Terminasi
                                                        </a>
                                                    </td>
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
