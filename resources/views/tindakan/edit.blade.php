@extends('layout/app')
@push('style')
    <style>
        .select2-container {
            display: block !important;
        }

        .select2-container .select2-selection--multiple {
            min-height: 50px !important;
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
                            Edit Data Tindakan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('tindakan.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('tindakan.update', $data->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="peserta_id">Peserta</label>
                                        <select name="peserta_id" id="peserta_id"
                                            class="form-control select2 @error('peserta_id') is-invalid @enderror">
                                            <option value="">-- Pilih Peserta --</option>
                                            @foreach ($peserta as $peserta)
                                                <option value="{{ $peserta->id }}"
                                                    {{ $peserta->id == $data->peserta_id ? 'selected' : '' }}>
                                                    {{ $peserta->nik }} -
                                                    {{ $peserta->nama_ppks }}</option>
                                            @endforeach
                                        </select>
                                        @error('peserta_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="tindakan">Jenis Tindakan</label>
                                        <select name="tindakan" id="tindakan"
                                            class="form-control @error('tindakan') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Tindakan --</option>
                                            <option value="Program/Layanan"
                                                {{ $data->tindakan == 'Program/Layanan' ? 'selected' : '' }}>Program/Layanan
                                            </option>
                                            <option value="Terminasi"
                                                {{ $data->tindakan == 'Terminasi' ? 'selected' : '' }}>Terminasi</option>
                                        </select>
                                        @error('tindakan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-layanan d-none">
                                        <div class="form-group mt-2">
                                            <label for="sub_layanan">Layanan</label>
                                            <select name="sub_layanan" id="sub_layanan"
                                                class="form-control @error('sub_layanan') is-invalid @enderror">
                                                <option value="">-- Pilih Jenis Layanan</option>
                                                <option value="Fisik"
                                                    {{ $data->sub_layanan == 'Fisik' ? 'selected' : '' }}>Fisik</option>
                                                <option value="Psikis"
                                                    {{ $data->sub_layanan == 'Psikis' ? 'selected' : '' }}>Psikis</option>
                                                <option value="Sosial"
                                                    {{ $data->sub_layanan == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                                <option value="Spiritual"
                                                    {{ $data->sub_layanan == 'Spiritual' ? 'selected' : '' }}>Spiritual
                                                </option>
                                                <option value="Pengasramaan"
                                                    {{ $data->sub_layanan == 'Pengasramaan' ? 'selected' : '' }}>
                                                    Pengasramaan</option>
                                            </select>
                                            @error('sub_layanan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-intervensi d-none">
                                            <div class="form-group mt-2">
                                                <label for="intervensi">Keterangan Intervensi</label>
                                                <input type="text" name="intervensi" id="intervensi"
                                                    placeholder="Keterangan Intervensi"
                                                    class="form-control @error('intervensi') is-invalid @enderror"
                                                    value="{{ old('intervensi', $data->intervensi) }}">
                                                @error('intervensi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-asrama d-none">
                                            <div class="form-group mt-2">
                                                <label for="kategori_asrama">Kategori Asrama</label>
                                                <select name="kategori_asrama" id="kategori_asrama"
                                                    class="form-control @error('kategori_asrama') is-invalid @enderror">
                                                    <option value="">-- Pilih Kategori Asrama --</option>
                                                    <option value="Asrama Laki-Laki"
                                                        {{ $data->kategori_asrama == 'Asrama Laki-Laki' ? 'selected' : '' }}>
                                                        Asrama Laki-Laki</option>
                                                    <option value="Asrama Perempuan"
                                                        {{ $data->kategori_asrama == 'Asrama Perempuan' ? 'selected' : '' }}>
                                                        Asrama Perempuan</option>
                                                </select>
                                                @error('kategori_asrama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nama_asrama">Nama Asrama</label>
                                                <input type="text" name="nama_asrama" id="nama_asrama"
                                                    class="form-control @error('nama_asrama') is-invalid @enderror"
                                                    placeholder="Nama Asrama"
                                                    value="{{ old('nama_asrama', $data->nama_asrama) }}">
                                                @error('nama_asrama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="deskripsi_layanan">Deskripsi Layanan</label>
                                            <textarea name="deskripsi_layanan" id="deskripsi_layanan" cols="30" rows="3"
                                                class="form-control @error('deskripsi_layanan') is-invalid @enderror" placeholder="Deskripsi Layanan">{{ old('deskripsi_layanan', $data->deskripsi_layanan) }}</textarea>
                                            @error('deskripsi_layanan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-terminasi d-none">
                                        <div class="form-group mt-2">
                                            <label for="tgl_terminasi">Tanggal Terminasi</label>
                                            <input type="text" name="tgl_terminasi" id="tgl_terminasi"
                                                placeholder="Tanggal Terminasi"
                                                class="form-control datePicker @error('tgl_terminasi') is-invalid @enderror"
                                                value="{{ old('tgl_terminasi', $data->tgl_terminasi) }}">
                                            @error('tgl_terminasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="alasan_terminasi">Alasan Terminasi</label>
                                            <textarea name="alasan_terminasi" id="alasan_terminasi" cols="30" rows="3" placeholder="Alasan Terminasi"
                                                class="form-control @error('alasan_terminasi') is-invalid @enderror">{{ old('alasan_terminasi', $data->alasan_terminasi) }}</textarea>
                                            @error('alasan_terminasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="syarat_dan_ketentuan">Syarat Dan Ketentuan</label>
                                            <select name="syarat_dan_ketentuan[]" id="syarat_dan_ketentuan"
                                                class="form-control form-multiple select2 @error('syarat_dan_ketentuan') is-invalid @enderror"
                                                multiple="multiple">
                                                <option value="Telah Menerima Layanan"
                                                    {{ in_array('Telah Menerima Layanan', $items) ? 'selected' : '' }}>
                                                    Telah Menerima Layanan</option>
                                                <option value="Permintaan Sendiri"
                                                    {{ in_array('Permintaan Sendiri', $items) ? 'selected' : '' }}>
                                                    Permintaan Sendiri</option>
                                                <option value="Pernah Melakukan Pelanggaran"
                                                    {{ in_array('Pernah Melakukan Pelanggaran', $items) ? 'selected' : '' }}>
                                                    Pernah Melakukan Pelanggaran
                                                </option>
                                            </select>
                                            @error('syarat_dan_ketentuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="deskripsi_masalah">Deskripsi Masalah</label>
                                        <textarea name="deskripsi_masalah" id="deskripsi_masalah" cols="30" rows="3"
                                            class="form-control @error('deskripsi_masalah') is-invalid @enderror" placeholder="Deskripsi Masalah">{{ old('deskripsi_masalah', $data->deskripsi_masalah) }}</textarea>
                                        @error('deskripsi_masalah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="deskripsi_hasil">Deskripsi Hasil</label>
                                        <textarea name="deskripsi_hasil" id="deskripsi_hasil" cols="30" rows="3"
                                            class="form-control @error('deskripsi_hasil') is-invalid @enderror" placeholder="Deskripsi Hasil">{{ old('deskripsi_hasil', $data->deskripsi_hasil) }}</textarea>
                                        @error('deskripsi_hasil')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut</label>
                                        <textarea name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" cols="30" rows="3"
                                            class="form-control @error('rencana_tindak_lanjut') is-invalid @enderror" placeholder="Rencana Tindak Lanjut">{{ old('rencana_tindak_lanjut', $data->rencana_tindak_lanjut) }}</textarea>
                                        @error('rencana_tindak_lanjut')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-layanan d-none">
                                        <div class="form-group mt-2">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <input type="text" name="tgl_masuk" id="tgl_masuk"
                                                placeholder="Tanggal Masuk"
                                                class="form-control datePicker @error('tgl_masuk') is-invalid @enderror"
                                                value="{{ old('tgl_masuk', $data->tgl_masuk) }}">
                                            @error('tgl_masuk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="tgl_keluar">Tanggal Keluar</label>
                                            <input type="text" name="tgl_keluar" id="tgl_keluar"
                                                placeholder="Tanggal Keluar"
                                                class="form-control datePicker @error('tgl_keluar') is-invalid @enderror"
                                                value="{{ old('tgl_keluar', $data->tgl_keluar) }}">
                                            @error('tgl_keluar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-2 float-end">
                                        <button type="submit" class="btn btn-success">
                                            <i class="align-middle" data-feather="save"></i> Simpan Data Tindakan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.datePicker').datepicker();
            $('.select2').select2();

            let formTidankan = $('#tindakan').val();
            if (formTidankan == 'Program/Layanan') {
                $('.form-layanan').removeClass('d-none');
                $('.form-layanan').addClass('d-block');
                $('.form-terminasi').addClass('d-none');
            }
            if (formTidankan == 'Terminasi') {
                $('.form-terminasi').removeClass('d-none');
                $('.form-terminasi').addClass('d-block');
                $('.form-layanan').addClass('d-none');
            }

            let formLayanan = $('#sub_layanan').val();
            if (formLayanan == 'Pengasramaan') {
                $('.form-asrama').removeClass('d-none');
                $('.form-asrama').addClass('d-block');
                $('.form-intervensi').addClass('d-none');
            } else {
                $('.form-intervensi').removeClass('d-none');
                $('.form-intervensi').addClass('d-block');
                $('.form-asrama').addClass('d-none');
            }

            $('#tindakan').change(function(e) {
                e.preventDefault();
                let data = $(this).val();
                if (data == 'Program/Layanan') {
                    $('.form-layanan').removeClass('d-none');
                    $('.form-layanan').addClass('d-block');
                    $('.form-terminasi').addClass('d-none');
                }
                if (data == 'Terminasi') {
                    $('.form-terminasi').removeClass('d-none');
                    $('.form-terminasi').addClass('d-block');
                    $('.form-layanan').addClass('d-none');
                }
            });

            $('#sub_layanan').change(function(e) {
                e.preventDefault();
                let data = $(this).val();
                if (data == 'Pengasramaan') {
                    $('.form-asrama').removeClass('d-none');
                    $('.form-asrama').addClass('d-block');
                    $('.form-intervensi').addClass('d-none');
                } else {
                    $('.form-intervensi').removeClass('d-none');
                    $('.form-intervensi').addClass('d-block');
                    $('.form-asrama').addClass('d-none');
                }
            });
        });
    </script>
@endpush
