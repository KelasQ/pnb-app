@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="float-start">
                            Data Dokumentasi Penerimaan Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('data-bantuan', $data->peserta_id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <td>
                                            <small>Nama Peserta</small><br>
                                            <strong>{{ $data->peserta->nama_ppks }}</strong>
                                        </td>
                                        <td>
                                            <small>Jenis Bantuan</small><br>
                                            <strong>{{ $data->bantuan }}</strong>
                                        </td>
                                        @if ($data->sub_bantuan !== null)
                                            <td>
                                                <small>Sub Bantuan</small><br>
                                                <strong>{{ $data->sub_bantuan }}</strong>
                                            </td>
                                        @endif
                                        <td>
                                            <small>Nominal Bantuan</small><br>
                                            <strong>Rp. {{ number_format($data->nominal_bantuan) }}</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('store-dokumentasi-bantuan') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="penerima_bantuan_id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="foto_dokumentasi">Foto Dokumentasi</label>
                                        <input type="file" name="foto_dokumentasi[]" id="foto_dokumentasi"
                                            class="form-control @error('foto_dokumentasi') is-invalid @enderror" multiple
                                            accept="image/png, image/jpeg, image/jpg">
                                        @error('foto_dokumentasi')
                                            <div class="invalid-feddback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group float-end mt-2">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="align-middle" data-feather="save"></i> Simpan Data Dokumentasi
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Foto Dokumentasi</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($documentations as $doc)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('/storage/dokumentasi/penerima_bantuan/' . $doc->foto_dokumentasi) }}"
                                                            class="rounded" style="width: 200px">
                                                    </td>
                                                    <td style="width: 110px;">
                                                        <form
                                                            action="{{ route('destroy-dokumentasi-penerima-bantuan', $doc->id) }}"
                                                            method="post">
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
