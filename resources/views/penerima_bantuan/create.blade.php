@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Form Registrasi Data Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('penerima-bantuan.index') }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('penerima-bantuan.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="layanan_id">Jenis Layanan</label>
                                                <select name="layanan_id" id="layanan_id" class="form-control select2"
                                                    data-placeholder="-- Pilih Jenis Layanan --">
                                                    <option value=""></option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->layanan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="karyawan_id">Petugas Asesment</label>
                                                <select name="karyawan_id" id="karyawan_id" class="form-control select2"
                                                    data-placeholder="-- Pilih Petugas --">
                                                    <option value=""></option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->nama }} -
                                                            {{ $employee->jabatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tgl_asesmen">Tanggal Asesment</label>
                                                <input type="text" name="tgl_asesmen" id="tgl_asesmen"
                                                    class="form-control datePicker" placeholder="Tanggal Asesment">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kasus_id">Sumber Kasus</label>
                                                <select name="kasus_id" id="kasus_id" class="form-control select2"
                                                    data-placeholder="-- Pilih Sumber Kasus --">
                                                    <option value=""></option>
                                                    @foreach ($cases as $case)
                                                        <option value="{{ $case->id }}">{{ $case->kasus }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="ket_kasus">Keterangan Kasus</label>
                                                <input type="text" name="ket_kasus" id="ket_kasus" class="form-control"
                                                    placeholder="Keterangan Kasus" disabled>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="klaster_id">Klaster</label>
                                                <select name="klaster_id" id="klaster_id" class="form-control select2"
                                                    data-placeholder="-- Pilih Klaster --">
                                                    <option value=""></option>
                                                    @foreach ($klasters as $klaster)
                                                        <option value="{{ $klaster->id }}">{{ $klaster->klaster }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="sub_klaster_id">Sub Klaster</label>
                                                <select name="sub_klaster_id" id="sub_klaster_id"
                                                    class="form-control select2"
                                                    data-placeholder="-- Plilih Sub Klasater --" disabled>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="provinsi_kode">Provinsi</label>
                                                <select name="provinsi_kode" id="provinsi_kode"
                                                    class="form-control select2">
                                                    <option value="">-- Plilih Provinsi --</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->kode }}">{{ $prov->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kota_kode">Kota / Kabupaten</label>
                                                <select name="kota_kode" id="kota_kode" class="form-control select2"
                                                    data-placeholder="-- Plilih Kota/Kabupaten --" disabled>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kecamatan_kode">Kecamatan</label>
                                                <select name="kecamatan_kode" id="kecamatan_kode"
                                                    class="form-control select2" data-placeholder="-- Plilih Kecamatan --"
                                                    disabled>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kelurahan_kode">Kelurahan</label>
                                                <select name="kelurahan_kode" id="kelurahan_kode"
                                                    class="form-control select2" data-placeholder="-- Plilih Kelurahan --"
                                                    disabled>
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="alamat_ktp">Alamat Sesuai KTP</label>
                                                <input type="text" name="alamat_ktp" id="alamat_ktp"
                                                    class="form-control" placeholder="Alamat Sesuai KTP">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="alamat_domisili">Alamat Domisili</label>
                                                <input type="text" name="alamat_domisili" id="alamat_domisili"
                                                    class="form-control" placeholder="Alamat Domisili">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nama_ppks">Nama PPKS</label>
                                                <input type="text" name="nama_ppks" id="nama_ppks"
                                                    class="form-control" placeholder="Nama PPKS">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nik">Nomor Induk Kependudukan</label>
                                                <input type="text" name="nik" id="nik" class="form-control"
                                                    placeholder="Nomor Induk Kependudukan">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="no_kk">Nomor Kartu Keluarga</label>
                                                <input type="text" name="no_kk" id="no_kk" class="form-control"
                                                    placeholder="Nomor Kartu Keluarga">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                    class="form-control" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="text" name="tgl_lahir" id="tgl_lahir"
                                                    class="form-control datePicker" placeholder="Tanggal Lahir">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="agama">Agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input type="text" name="pendidikan" id="pendidikan"
                                                    class="form-control" placeholder="Pendidikan">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" name="pekerjaan" id="pekerjaan"
                                                    class="form-control" placeholder="Pekerjaan">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="penghasilan_per_bulan">Penghasilan Per Bulan</label>
                                                <input type="number" name="penghasilan_per_bulan"
                                                    id="penghasilan_per_bulan" class="form-control"
                                                    placeholder="Penghasilan Per Bulan">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" name="nama_ibu" id="nama_ibu"
                                                    class="form-control" placeholder="Nama Ibu">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nama_ayah">Nama Ayah</label>
                                                <input type="text" name="nama_ayah" id="nama_ayah"
                                                    class="form-control" placeholder="Nama Ayah">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pekerjaan_org_tua">Pekerjaan Orang Tua / Wali</label>
                                                <input type="text" name="pekerjaan_org_tua" id="pekerjaan_org_tua"
                                                    class="form-control" placeholder="Pekerjaan Orang Tua / Wali">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="no_hp_wali">No. Telp Wali</label>
                                                <input type="text" name="no_hp_wali" id="no_hp_wali"
                                                    class="form-control" placeholder="No. Telp Wali">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="dtiks">Sudah Masuk DTIKS</label>
                                                <select name="dtiks" id="dtiks" class="form-control">
                                                    <option value="">-- Pilih Salah Satu --</option>
                                                    <option value="Sudah">Sudah</option>
                                                    <option value="Belum">Belum</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="bantuan_pernah_diterima">Bantuan Yang Pernah Diterima</label>
                                                <select name="bantuan_pernah_diterima" id="bantuan_pernah_diterima"
                                                    class="form-control select2"
                                                    data-placeholder="-- Pilih Jenis Bantuan --">
                                                    <option value=""></option>
                                                    @foreach ($bantuans as $bantuan)
                                                        <option value="{{ $bantuan->id }}">{{ $bantuan->bantuan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="hasil_asesmen">Hasil Asesment</label>
                                                <textarea name="hasil_asesmen" id="hasil_asesmen" cols="30" rows="3" class="form-control"
                                                    placeholder="Hasil Asesment"></textarea>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="rekomendasi">Rekomendasil</label>
                                                <textarea name="rekomendasi" id="rekomendasi" cols="30" rows="3" class="form-control"
                                                    placeholder="Rekomendasil"></textarea>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="intervensi">Intervensi</label>
                                                <textarea name="intervensi" id="intervensi" cols="30" rows="3" class="form-control"
                                                    placeholder="Intervensi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tgl_pelayanan">Tgl Pelayanan</label>
                                                <input type="text" name="tgl_pelayanan" id="tgl_pelayanan"
                                                    class="form-control datePicker" placeholder="Tanggal Pelayanan"
                                                    value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_ktp">Foto KTP</label>
                                                <input type="file" name="foto_ktp" id="foto_ktp"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_diri">Foto Diri</label>
                                                <input type="file" name="foto_diri" id="foto_diri"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_kk">Foto KK</label>
                                                <input type="file" name="foto_kk" id="foto_kk"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row float-end">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                <i class="align-middle" data-feather="save"></i> Simpan Data Registrasi
                                            </button>
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
        })

        $('#kasus_id').change(function(e) {
            e.preventDefault();
            let kasus_id = $('#kasus_id').val();
            $.ajax({
                url: "{{ url('getDataKasus') }}/" + kasus_id,
                success: function(response) {
                    const kasus = response.kasus;
                    if (kasus.toLowerCase() == 'rujukan' || kasus.toLowerCase() == 'aspirasi dpr' ||
                        kasus.toLowerCase() ==
                        'reguler/ pendaftaran mandiri/ outreach') {
                        $('#ket_kasus').removeAttr('disabled');
                    } else {
                        $('#ket_kasus').attr('disabled', '');
                    }
                }
            });
        });

        function onChangeSelect(url, id, name, placeholder) {
            $.ajax({
                url: url,
                data: {
                    id: id
                },
                success: function(data) {
                    let select = $('#' + name);
                    select.empty();
                    select.append(`<option>${placeholder}</option>`);
                    $.each(data, function(key, value) {
                        select.append(`<option value="${value.id}">${value.sub_klaster}</option>`);
                    });
                }
            });
        }

        $('#klaster_id').change(function() {
            var id = $(this).val();
            var url = "{{ url('getDataSubKlaster') }}";
            var placeholder = "-- Pilih Sub Klaster --";
            var name = "sub_klaster_id";
            onChangeSelect(url, id, name, placeholder);
            $('#sub_klaster_id').removeAttr('disabled');
        })

        function onChangeWilayah(url, kode, name, placeholder) {
            $.ajax({
                url: url,
                data: {
                    kode: kode
                },
                success: function(data) {
                    let select = $('#' + name);
                    select.empty();
                    select.append(`<option>${placeholder}</option>`);
                    $.each(data, function(key, value) {
                        select.append(`<option value="${value.kode}">${value.nama}</option>`);
                    });
                }
            });
        }
        $('#provinsi_kode').change(function() {
            var kode = $(this).val();
            var url = "{{ url('getDataKabupaten') }}";
            var placeholder = "-- Pilih Kota/Kabupaten --";
            var name = "kota_kode";
            onChangeWilayah(url, kode, name, placeholder);
            $('#kota_kode').removeAttr('disabled');
        });
        $('#kota_kode').change(function() {
            var kode = $(this).val();
            var url = "{{ url('getDataKecamatan') }}";
            var placeholder = "-- Pilih Kecamatan --";
            var name = "kecamatan_kode";
            onChangeWilayah(url, kode, name, placeholder);
            $('#kecamatan_kode').removeAttr('disabled');
        });
        $('#kecamatan_kode').change(function() {
            var kode = $(this).val();
            var url = "{{ url('getDataKelurahan') }}";
            var placeholder = "-- Pilih Kelurahan --";
            var name = "kelurahan_kode";
            onChangeWilayah(url, kode, name, placeholder);
            $('#kelurahan_kode').removeAttr('disabled');
        });
    </script>
@endpush
