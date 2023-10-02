@extends('layout/app')
@push('style')
    <style>
        .dataPeserta {
            width: 100%;
        }

        .dataPeserta tr {
            border-bottom: 1px solid #000;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Data Registrasi Peserta Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('peserta.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- {{ dd($status_bantuan) }} --}}
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Status Penerimaan Bantuan</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if ($status_bantuan === 0)
                                                    <span class="text-danger">Peserta Belum Menerima Bantuan</span>
                                                @else
                                                    <span class="text-success">Peserta Telah Menerima Bantuan</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($status_bantuan === 0)
                                                    <a href="{{ route('penerima-bantuan.create') }}"
                                                        class="btn btn-primary btn-sm"><i class="align-middle"
                                                            data-feather="plus-circle"></i> Input Data Bantuan</a>
                                                @else
                                                    <form action="{{ route('penerima-bantuan.destroy', $data->id) }}"
                                                        method="post" style="display: inline;">
                                                        <a href="{{ route('penerima-bantuan.show', $data->id) }}"
                                                            class="btn btn-info btn-sm" title="Show Data"><i
                                                                class="align-middle" data-feather="eye"></i> Lihat Data
                                                            Bantuan</a>
                                                        <a href="{{ route('penerima-bantuan.edit', $data->id) }}"
                                                            class="btn btn-warning btn-sm" title="Edit Data"><i
                                                                class="align-middle" data-feather="edit"></i> Edit Data
                                                            Bantuan</a>
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" title="Hapus Data"
                                                            class="btn btn-danger btn-sm btnHapusData"
                                                            onclick="return confirm('Yakin Ingin Dihapus ?')"><i
                                                                class="align-middle" data-feather="trash-2"></i> Hapus Data
                                                            Bantuan</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-hover dataPeserta">
                                    <tr>
                                        <td>
                                            <small>Jenis Layanan :</small><br>
                                            <strong>{{ $data->layanan->layanan }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Tgl Asesmen :</small><br>
                                            <strong>{{ date('d F Y', strtotime($data->tgl_asesmen)) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Sumber Kasus :</small><br>
                                            <strong>{{ $data->kasus->kasus }}</strong>
                                        </td>
                                    </tr>
                                    @if ($data->ket_kasus != null)
                                        <tr>
                                            <td>
                                                <small>Keterangan Kasus :</small><br>
                                                <strong>{{ $data->ket_kasus }}</strong>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <small>Klaster :</small><br>
                                            <strong>{{ $data->klaster->klaster }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Sub Klaster :</small><br>
                                            <strong>{{ $data->subKlaster->sub_klaster }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Provinsi :</small><br>
                                            <strong>{{ $provinsi[0]->nama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Kabupaten/Kota :</small><br>
                                            <strong>{{ $kota[0]->nama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Kecamatan :</small><br>
                                            <strong>{{ $kecamatan[0]->nama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Kelurahan :</small><br>
                                            <strong>{{ $kelurahan[0]->nama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Alamat KTP :</small><br>
                                            <strong>{{ $data->alamat_ktp }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Alamat Domisili :</small><br>
                                            <strong>{{ $data->alamat_domisili }}</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-hover dataPeserta">
                                    <tr>
                                        <td>
                                            <small>Nama PPKS :</small><br>
                                            <strong>{{ $data->nama_ppks }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nomor Induk Kependudukan :</small><br>
                                            <strong>{{ $data->nik }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nomor Kartu Keluarga :</small><br>
                                            <strong>{{ $data->no_kk }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Tempat, Tgl Lahir :</small><br>
                                            <strong>{{ $data->tempat_lahir }},
                                                {{ date('d F Y', strtotime($data->tgl_lahir)) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Jenis Kelamin :</small><br>
                                            <strong>{{ $data->jenis_kelamin }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Agama :</small><br>
                                            <strong>{{ $data->agama }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Pendidikan :</small><br>
                                            <strong>{{ $data->pendidikan }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Pekerjaan :</small><br>
                                            <strong>{{ $data->pekerjaan }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Penghasilan Per Bulan :</small><br>
                                            <strong>Rp. {{ number_format($data->penghasilan_per_bulan) }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Foto KTP :</small><br>
                                            <img src="{{ asset('/storage/registrasi/ktp/' . $data->foto_ktp) }}"
                                                class="rounded" style="width: 100px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Foto KK :</small><br>
                                            <img src="{{ asset('/storage/registrasi/kk/' . $data->foto_kk) }}"
                                                class="rounded" style="width: 100px">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-hover dataPeserta">
                                    <tr>
                                        <td>
                                            <small>Nama Ibu :</small><br>
                                            <strong>{{ $data->nama_ibu }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Nama Ayah :</small><br>
                                            <strong>{{ $data->nama_ayah }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Pekerjaan Orang Tua :</small><br>
                                            <strong>{{ $data->pekerjaan_org_tua }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>No. Hp Orang Tua / Wali :</small><br>
                                            <strong>{{ $data->no_hp_wali }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>DTIKS :</small><br>
                                            <strong>{{ $data->dtiks }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Bantuan Pernah Diterima :</small><br>
                                            <strong>{{ $data->bantuan_pernah_diterima }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Hasil Asesmen :</small><br>
                                            <strong>{{ $data->hasil_asesmen }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Rekomendasi :</small><br>
                                            <strong>{{ $data->rekomendasi }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Intervensi :</small><br>
                                            <strong>{{ $data->intervensi }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Foto Diri :</small><br>
                                            <img src="{{ asset('/storage/registrasi/photo/' . $data->foto_diri) }}"
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
