@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Data Tindakan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('tindakan.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <table class="table table-hover">
                                    <tr>
                                        <td>
                                            <small>Peserta</small><br>
                                            <strong>{{ $data->peserta->nama_ppks }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Jenis Tindakan</small><br>
                                            <strong>{{ $data->tindakan }}</strong>
                                        </td>
                                    </tr>
                                    @if ($data->sub_layanan)
                                        <tr>
                                            <td>
                                                <small>Sub Layanan</small><br>
                                                <strong>{{ $data->sub_layanan }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->kategori_asrama)
                                        <tr>
                                            <td>
                                                <small>Kategori Asrama</small><br>
                                                <strong>{{ $data->kategori_asrama }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->nama_asrama)
                                        <tr>
                                            <td>
                                                <small>Nama Asrama</small><br>
                                                <strong>{{ $data->nama_asrama }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->intervensi)
                                        <tr>
                                            <td>
                                                <small>Keterangan Intervensi</small><br>
                                                <strong>{{ $data->intervensi }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->deskripsi_layanan)
                                        <tr>
                                            <td>
                                                <small>Deskripsi Layanan</small><br>
                                                <strong>{{ $data->deskripsi_layanan }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->tgl_terminasi)
                                        <tr>
                                            <td>
                                                <small>Tanggal Terminasi</small><br>
                                                <strong>{{ date('d F Y', strtotime($data->tgl_terminasi)) }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->alasan_terminasi)
                                        <tr>
                                            <td>
                                                <small>Alasan Terminasi</small><br>
                                                <strong>{{ $data->alasan_terminasi }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->syarat_dan_ketentuan)
                                        <tr>
                                            <td>
                                                <small>Syarat Dan Ketentuan</small><br>
                                                @foreach (explode(',', $data->syarat_dan_ketentuan) as $item)
                                                    <strong>
                                                        <li>{{ $item }}</li>
                                                    </strong>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <small>Deskripsi Masalah</small><br>
                                            <strong>{{ $data->deskripsi_masalah }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Deskripsi Hasil</small><br>
                                            <strong>{{ $data->deskripsi_hasil }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Rencana Tindak Lanjut</small><br>
                                            <strong>{{ $data->rencana_tindak_lanjut }}</strong>
                                        </td>
                                    </tr>
                                    @if ($data->tgl_masuk)
                                        <tr>
                                            <td>
                                                <small>Tanggal Masuk</small><br>
                                                <strong>{{ date('d F Y', strtotime($data->tgl_masuk)) }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($data->tgl_keluar)
                                        <tr>
                                            <td>
                                                <small>Tanggal Keluar</small><br>
                                                <strong>{{ date('d F Y', strtotime($data->tgl_keluar)) }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
