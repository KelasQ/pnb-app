@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Data Laporan Residensial</h3>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: -30px;">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('get-lap-residensial') }}" method="post">
                                    @method('POST')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <select class="form-select flex-grow-1" name="tindakan" id="tindakan">
                                            <option value="">-- Pilih Jenis Tindakan --</option>
                                            <option value="Program/Layanan">Program/Layanan</option>
                                            <option value="Terminasi">Terminasi</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit"><i class="align-middle"
                                                data-feather="file-text"></i> Tampilkan Laporan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if ($data)
                            <div class="row">
                                <hr>
                                <p style="margin-bottom: -30px;">Jenis Tindakan : <strong>{{ $tindakan }}</strong></p>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-stripped dataTable">
                                            <thead>
                                                <th>No</th>
                                                <th>Tgl Pemberian</th>
                                                <th>Nama Peserta</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('d F Y H:i', strtotime($row->created_at)) }}</td>
                                                        <td>{{ $row->peserta->nama_ppks }}</td>
                                                        <td>
                                                            <a href="{{ route('dokumen-residensial', [$row->peserta_id, str_replace('/', '&', $row->tindakan)]) }}"
                                                                target="_blank" class="btn btn-success btn-sm">
                                                                <i class="align-middle" data-feather="printer"></i> Cetak
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
