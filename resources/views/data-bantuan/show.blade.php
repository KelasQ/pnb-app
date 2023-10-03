@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Data Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('data-bantuan', $data->id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <table class="table table-hover">
                                    <tr>
                                        <td>
                                            <small>Peserta Penerima Bantuan</small><br>
                                            <strong>{{ $data->peserta->nama_ppks }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Jenis Bantuan Yang Di Terima</small><br>
                                            <strong>{{ $data->bantuan }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Keterangan Bantuan</small><br>
                                            @if ($data->sub_bantuan != null)
                                                <strong>{{ $data->sub_bantuan }}</strong>
                                            @else
                                                <strong>{{ $data->keterangan }}</strong>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Tanggal Pemebrian Bantuan</small><br>
                                            <strong>{{ date('d F Y', strtotime($data->tgl_pemberian)) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nominal Bantuan</small><br>
                                            <strong>Rp. {{ number_format($data->nominal_bantuan) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Petugas Yg Menyerahkan Bantuan</small><br>
                                            <strong>{{ $data->karyawan->nama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Foto Dokumentasi</small><br>
                                            <img src="{{ asset('/storage/dokumentasi/peneriam_bantuan/' . $data->foto_dokumentasi) }}"
                                                class="rounded" style="width: 200px">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
