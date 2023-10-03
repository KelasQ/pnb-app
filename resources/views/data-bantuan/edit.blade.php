@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="float-start">
                            Update Data Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('data-bantuan', $data->id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('update-data-bantuan', $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="peserta_id" value="{{ $data->peserta_id }}">
                                    <div class="form-group">
                                        <label for="bantuan">Jenis Bantuan</label>
                                        <select name="bantuan" id="bantuan"
                                            class="form-control @error('bantuan') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Bantuan --</option>
                                            <option value="DUKUNGAN PEMENUHAN KEBUTUHAN HIDUP LAYAK"
                                                {{ $data->bantuan == 'DUKUNGAN PEMENUHAN KEBUTUHAN HIDUP LAYAK' ? 'selected' : '' }}>
                                                DUKUNGAN PEMENUHAN
                                                KEBUTUHAN HIDUP LAYAK</option>
                                            <option value="PERAWATAN SOSIAL DAN/ ATAU PENGASUHAN ANAK"
                                                {{ $data->bantuan == 'PERAWATAN SOSIAL DAN/ ATAU PENGASUHAN ANAK' ? 'selected' : '' }}>
                                                PERAWATAN SOSIAL DAN/
                                                ATAU PENGASUHAN ANAK</option>
                                            <option value="DUKUNGAN KELUARGA"
                                                {{ $data->bantuan == 'DUKUNGAN KELUARGA' ? 'selected' : '' }}>DUKUNGAN
                                                KELUARGA</option>
                                            <option value="TERAPI FISIK, TERAPI PSIKOSOSIAL, DAN TERAPI MENTAL SPIRITUAL"
                                                {{ $data->bantuan == 'TERAPI FISIK, TERAPI PSIKOSOSIAL, DAN TERAPI MENTAL SPIRITUAL' ? 'selected' : '' }}>
                                                TERAPI FISIK, TERAPI PSIKOSOSIAL, DAN TERAPI MENTAL SPIRITUAL</option>
                                            <option value="PELATIHAN VOKASIONAL DAN/ ATAU PEMBINAAN KEWIRAUSAHAAN"
                                                {{ $data->bantuan == 'PELATIHAN VOKASIONAL DAN/ ATAU PEMBINAAN KEWIRAUSAHAAN' ? 'selected' : '' }}>
                                                PELATIHAN
                                                VOKASIONAL DAN/ ATAU PEMBINAAN KEWIRAUSAHAAN</option>
                                            <option value="BANTUAN DAN ASISTENSI SOSIAL"
                                                {{ $data->bantuan == 'BANTUAN DAN ASISTENSI SOSIAL' ? 'selected' : '' }}>
                                                BANTUAN DAN ASISTENSI SOSIAL
                                            </option>
                                            <option value="DUKUNGAN AKSESIBILITAS"
                                                {{ $data->bantuan == 'DUKUNGAN AKSESIBILITAS' ? 'selected' : '' }}>DUKUNGAN
                                                AKSESIBILITAS</option>
                                        </select>
                                        @error('bantuan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="sub_bantuan">Jenis Sub Bantuan</label>
                                        <select name="sub_bantuan" id="sub_bantuan"
                                            class="form-control @error('sub_bantuan') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih Jenis Sub Bantuan --</option>
                                            <option value="KURSI RODA"
                                                {{ $data->sub_bantuan == 'KURSI RODA' ? 'selected' : '' }}>KURSI RODA
                                            </option>
                                            <option value="TONGKAT"
                                                {{ $data->sub_bantuan == 'TONGKAT' ? 'selected' : '' }}>
                                                TONGKAT</option>
                                            <option value="WALKER" {{ $data->sub_bantuan == 'WALKER' ? 'selected' : '' }}>
                                                WALKER</option>
                                            <option value="MOTOR TIGA RODA"
                                                {{ $data->sub_bantuan == 'MOTOR TIGA RODA' ? 'selected' : '' }}>MOTOR TIGA
                                                RODA</option>
                                            <option value="LAIN-LAIN"
                                                {{ $data->sub_bantuan == 'LAIN-LAIN' ? 'selected' : '' }}>LAIN-LAIN
                                            </option>
                                        </select>
                                        @error('sub_bantuan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" cols="30" rows="2"
                                            class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan Bantuan" disabled>{{ old('keterangan', $data->keterangan) }}</textarea>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="tgl_pemberian">Tanggal Pemberian</label>
                                            <input type="text" name="tgl_pemberian" id="tgl_pemberian"
                                                class="form-control datePicker @error('tgl_pemberian') is-invalid @enderror"
                                                value="{{ old('tgl_pemberian', $data->tgl_pemberian) }}"
                                                placeholder="Tanggal Pemberian">
                                            @error('tgl_pemberian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="karyawan_id">Petugas Yg Menyerahkan</label>
                                            <select name="karyawan_id" id="karyawan_id"
                                                class="form-control select2 @error('karyawan_id') is-invalid @enderror">
                                                <option value="">-- Pilih Petugas --</option>
                                                @foreach ($karyawan as $karyawan)
                                                    <option value="{{ $karyawan->id }}"
                                                        {{ $karyawan->id == $data->karyawan_id ? 'selected' : '' }}>
                                                        {{ $karyawan->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('karyawan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="nominal_bantuan">Nominal Bantuan</label>
                                            <input type="number" name="nominal_bantuan" id="nominal_bantuan"
                                                class="form-control @error('nominal_bantuan') is-invalid @enderror"
                                                value="{{ old('nominal_bantuan', $data->nominal_bantuan) }}"
                                                placeholder="Nominal Bantuan">
                                            @error('nominal_bantuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="foto_dokumentasi">Foto Dokumentasi</label>
                                            <input type="file" name="foto_dokumentasi" id="foto_dokumentasi"
                                                class="form-control @error('foto_dokumentasi') is-invalid @enderror"
                                                accept="image/png, image/jpeg, image/jpg">
                                            @error('foto_dokumentasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-success float-end"><i class="align-middle"
                                                    data-feather="save"></i> Update Data
                                                Bantuan</button>
                                        </div>
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
        $('.datePicker').datepicker();

        $('.select2').select2({
            // theme: "bootstrap-5",
            placeholder: $(this).data('placeholder')
        });

        $('#bantuan').change(function(e) {
            e.preventDefault();
            const bantuan = $(this).val();
            if (bantuan.toLowerCase() == 'dukungan aksesibilitas') {
                $('#sub_bantuan').removeAttr('disabled');
                $('#keterangan').attr('disabled', '');
            } else {
                $('#keterangan').removeAttr('disabled');
                $('#sub_bantuan').attr('disabled', '');
            }
        });
    </script>
@endpush
