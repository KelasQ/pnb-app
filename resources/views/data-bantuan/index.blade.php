@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Penerimaan Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('registrasi.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <td>
                                            <small>Nomor Induk Kependudukan</small><br>
                                            <strong>{{ $data->nik }}</strong>
                                        </td>
                                        <td>
                                            <small>Jenis Layanan</small><br>
                                            <strong>{{ $data->layanan->layanan }}</strong>
                                        </td>
                                        <td>
                                            <small>Tgl Asesmen | Tgl Pelayanan</small><br>
                                            <strong>{{ date('d F Y', strtotime($data->tgl_asesmen)) }} |
                                                {{ date('d F Y', strtotime($data->tgl_pelayanan)) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nomor Kartu Keluarga</small><br>
                                            <strong>{{ $data->no_kk }}</strong>
                                        </td>
                                        <td>
                                            <small>Sumber Kasus</small><br>
                                            <strong>{{ $data->kasus->kasus }}</strong>
                                        </td>
                                        <td>
                                            <small>Keterangan Kasus</small><br>
                                            <strong>{{ $data->ket_kasus }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nama Peserta</small><br>
                                            <strong>{{ $data->nama_ppks }}</strong>
                                        </td>
                                        <td>
                                            <small>Jenis Klaster</small><br>
                                            <strong>{{ $data->klaster->klaster }}</strong>
                                        </td>
                                        <td>
                                            <small>Sub Klaster</small><br>
                                            <strong>{{ $data->subKlaster->sub_klaster }}</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="float-start">
                            Data Bantuan Yang Diterima
                        </div>
                        <div class="float-end">
                            <a href="{{ route('input-data-bantuan', $data->id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="plus-circle"></i> Input Data Bantuan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Jenis Bantuan Yang Diterima</th>
                                            <th>Nominal Bantuan</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataBantuan as $bantuan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bantuan->bantuan }}</td>
                                                    <td>Rp. {{ number_format($bantuan->nominal_bantuan) }}</td>
                                                    <td>
                                                        <form action="{{ route('destroy-data-bantuan', $bantuan->id) }}"
                                                            method="post" style="display: inline;">
                                                            <a href="{{ route('show-data-bantuan', $bantuan->id) }}"
                                                                class="btn btn-info btn-sm" title="Show Data"><i
                                                                    class="align-middle" data-feather="eye"></i></a>
                                                            <a href="{{ route('edit-data-bantuan', $bantuan->id) }}"
                                                                class="btn btn-warning btn-sm" title="Edit Data"><i
                                                                    class="align-middle" data-feather="edit"></i></a>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" title="Hapus Data"
                                                                class="btn btn-danger btn-sm btnHapusData"
                                                                onclick="return confirm('Yakin Ingin Dihapus ?')"><i
                                                                    class="align-middle"
                                                                    data-feather="trash-2"></i></button>
                                                        </form>
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
