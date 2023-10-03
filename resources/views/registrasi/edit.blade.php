@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Form Update Data Registrasi Peserta Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('registrasi.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('registrasi.update', $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="layanan_id">Jenis Layanan</label>
                                                <select name="layanan_id" id="layanan_id"
                                                    class="form-control select2 @error('layanan_id') is-invalid @enderror"
                                                    data-placeholder="-- Pilih Jenis Layanan --">
                                                    <option value=""></option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"
                                                            {{ $service->id === $data->layanan_id ? 'selected' : '' }}>
                                                            {{ $service->layanan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('layanan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="karyawan_id">Petugas Asesment</label>
                                                <select name="karyawan_id" id="karyawan_id"
                                                    class="form-control select2 @error('karyawan_id') is-invalid @enderror"
                                                    data-placeholder="-- Pilih Petugas --">
                                                    <option value=""></option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}"
                                                            {{ $employee->id === $data->karyawan_id ? 'selected' : '' }}>
                                                            {{ $employee->nama }} -
                                                            {{ $employee->jabatan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('karyawan_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tgl_asesmen">Tanggal Asesment</label>
                                                <input type="text" value="{{ old('tgl_asesmen', $data->tgl_asesmen) }}"
                                                    name="tgl_asesmen" id="tgl_asesmen"
                                                    class="form-control datePicker @error('tgl_asesmen') is-invalid @enderror"
                                                    placeholder="Tanggal Asesment">
                                                @error('tgl_asesmen')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kasus_id">Sumber Kasus</label>
                                                <select name="kasus_id" id="kasus_id"
                                                    class="form-control select2 @error('kasus_id') is-invalid @enderror"
                                                    data-placeholder="-- Pilih Sumber Kasus --">
                                                    <option value=""></option>
                                                    @foreach ($cases as $case)
                                                        <option value="{{ $case->id }}"
                                                            {{ $case->id === $data->kasus_id ? 'selected' : '' }}>
                                                            {{ $case->kasus }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kasus_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="ket_kasus">Keterangan Kasus</label>
                                                <input type="text" value="{{ old('ket_kasus', $data->ket_kasus) }}"
                                                    name="ket_kasus" id="ket_kasus"
                                                    class="form-control @error('ket_kasus') is-invalid @enderror"
                                                    placeholder="Keterangan Kasus" disabled>
                                                @error('ket_kasus')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="klaster_id">Klaster</label>
                                                <select name="klaster_id" id="klaster_id"
                                                    class="form-control select2 @error('klaster_id') is-invalid @enderror"
                                                    data-placeholder="-- Pilih Klaster --">
                                                    <option value=""></option>
                                                    @foreach ($klasters as $klaster)
                                                        <option value="{{ $klaster->id }}"
                                                            {{ $klaster->id === $data->klaster_id ? 'selected' : '' }}>
                                                            {{ $klaster->klaster }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('klaster_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="sub_klaster_id">Sub Klaster</label>
                                                <select name="sub_klaster_id" id="sub_klaster_id"
                                                    class="form-control select2 @error('sub_klaster_id') is-invalid @enderror"
                                                    data-placeholder="-- Plilih Sub Klasater --">
                                                    @if ($sub_klaster[0]->id === $data->sub_klaster_id)
                                                        <option value="{{ $data->sub_klaster_id }}">
                                                            {{ $sub_klaster[0]->sub_klaster }}</option>
                                                    @endif
                                                    <option></option>
                                                </select>
                                                @error('sub_klaster_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="provinsi_kode">Provinsi</label>
                                                <select name="provinsi_kode" id="provinsi_kode"
                                                    class="form-control select2 @error('provinsi_kode') is-invalid @enderror">
                                                    <option value="">-- Plilih Provinsi --</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->kode }}"
                                                            {{ $prov->kode === $data->provinsi_kode ? 'selected' : '' }}>
                                                            {{ $prov->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('provinsi_kode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kota_kode">Kota / Kabupaten</label>
                                                <select name="kota_kode" id="kota_kode"
                                                    class="form-control select2 @error('kota_kode') is-invalid @enderror"
                                                    data-placeholder="-- Plilih Kota/Kabupaten --">
                                                    <option value="{{ $kota[0]->kode }}">{{ $kota[0]->nama }}</option>
                                                </select>
                                                @error('kota_kode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kecamatan_kode">Kecamatan</label>
                                                <select name="kecamatan_kode" id="kecamatan_kode"
                                                    class="form-control select2 @error('kecamatan_kode') is-invalid @enderror"
                                                    data-placeholder="-- Plilih Kecamatan --">
                                                    <option value="{{ $kecamatan[0]->kode }}">{{ $kecamatan[0]->nama }}
                                                    </option>
                                                </select>
                                                @error('kecamatan_kode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="kelurahan_kode">Kelurahan</label>
                                                <select name="kelurahan_kode" id="kelurahan_kode"
                                                    class="form-control select2 @error('kelurahan_kode') is-invalid @enderror"
                                                    data-placeholder="-- Plilih Kelurahan --">
                                                    <option value="{{ $kelurahan[0]->kode }}">{{ $kelurahan[0]->nama }}
                                                    </option>
                                                </select>
                                                @error('kelurahan_kode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="alamat_ktp">Alamat Sesuai KTP</label>
                                                <input type="text" value="{{ old('alamat_ktp', $data->alamat_ktp) }}"
                                                    name="alamat_ktp" id="alamat_ktp"
                                                    class="form-control @error('alamat_ktp') is-invalid @enderror"
                                                    placeholder="Alamat Sesuai KTP">
                                                @error('alamat_ktp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="alamat_domisili">Alamat Domisili</label>
                                                <input type="text"
                                                    value="{{ old('alamat_domisili', $data->alamat_domisili) }}"
                                                    name="alamat_domisili" id="alamat_domisili"
                                                    class="form-control @error('alamat_domisili') is-invalid @enderror"
                                                    placeholder="Alamat Domisili">
                                                @error('alamat_domisili')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nama_ppks">Nama PPKS</label>
                                                <input type="text" value="{{ old('nama_ppks', $data->nama_ppks) }}"
                                                    name="nama_ppks" id="nama_ppks"
                                                    class="form-control @error('nama_ppks') is-invalid @enderror"
                                                    placeholder="Nama PPKS">
                                                @error('nama_ppks')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nik">Nomor Induk Kependudukan</label>
                                                <input type="text" value="{{ old('nik', $data->nik) }}"
                                                    name="nik" id="nik"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    placeholder="Nomor Induk Kependudukan">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="no_kk">Nomor Kartu Keluarga</label>
                                                <input type="text" value="{{ old('no_kk', $data->no_kk) }}"
                                                    name="no_kk" id="no_kk"
                                                    class="form-control @error('no_kk') is-invalid @enderror"
                                                    placeholder="Nomor Kartu Keluarga">
                                                @error('no_kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text"
                                                    value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                                                    name="tempat_lahir" id="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    placeholder="Tempat Lahir">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="text" value="{{ old('tgl_lahir', $data->tgl_lahir) }}"
                                                    name="tgl_lahir" id="tgl_lahir"
                                                    class="form-control datePicker @error('tgl_lahir') is-invalid @enderror"
                                                    placeholder="Tanggal Lahir">
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                    <option value="Laki-Laki"
                                                        {{ $data->jenis_kelamin === 'Laki-Laki' ? 'selected' : '' }}>
                                                        Laki-Laki</option>
                                                    <option value="Perempuan"
                                                        {{ $data->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="agama">Agama</label>
                                                <select name="agama" id="agama"
                                                    class="form-control @error('agama') is-invalid @enderror">
                                                    <option value="Islam"
                                                        {{ $data->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen Katolik"
                                                        {{ $data->agama === 'Kristen Katolik' ? 'selected' : '' }}>Kristen
                                                        Katolik</option>
                                                    <option value="Kristen Protestan"
                                                        {{ $data->agama === 'Kristen Protestan' ? 'selected' : '' }}>
                                                        Kristen Protestan</option>
                                                    <option value="Hindu"
                                                        {{ $data->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Budha"
                                                        {{ $data->agama === 'Budha' ? 'selected' : '' }}>Budha</option>
                                                </select>
                                                @error('agama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input type="text" value="{{ old('pendidikan', $data->pendidikan) }}"
                                                    name="pendidikan" id="pendidikan"
                                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                                    placeholder="Pendidikan">
                                                @error('pendidikan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" value="{{ old('pekerjaan', $data->pekerjaan) }}"
                                                    name="pekerjaan" id="pekerjaan"
                                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                                    placeholder="Pekerjaan">
                                                @error('pekerjaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="penghasilan_per_bulan">Penghasilan Per Bulan</label>
                                                <input type="number"
                                                    value="{{ old('penghasilan_per_bulan', $data->penghasilan_per_bulan) }}"
                                                    name="penghasilan_per_bulan" id="penghasilan_per_bulan"
                                                    class="form-control @error('penghasilan_per_bulan') is-invalid @enderror"
                                                    placeholder="Penghasilan Per Bulan">
                                                @error('penghasilan_per_bulan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" value="{{ old('nama_ibu', $data->nama_ibu) }}"
                                                    name="nama_ibu" id="nama_ibu"
                                                    class="form-control @error('nama_ibu') is-invalid @enderror"
                                                    placeholder="Nama Ibu">
                                                @error('nama_ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="nama_ayah">Nama Ayah</label>
                                                <input type="text" value="{{ old('nama_ayah', $data->nama_ayah) }}"
                                                    name="nama_ayah" id="nama_ayah"
                                                    class="form-control @error('nama_ayah') is-invalid @enderror"
                                                    placeholder="Nama Ayah">
                                                @error('nama_ayah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="pekerjaan_org_tua">Pekerjaan Orang Tua / Wali</label>
                                                <input type="text"
                                                    value="{{ old('pekerjaan_org_tua', $data->pekerjaan_org_tua) }}"
                                                    name="pekerjaan_org_tua" id="pekerjaan_org_tua"
                                                    class="form-control @error('pekerjaan_org_tua') is-invalid @enderror"
                                                    placeholder="Pekerjaan Orang Tua / Wali">
                                                @error('pekerjaan_org_tua')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="no_hp_wali">No. Telp Wali</label>
                                                <input type="text" value="{{ old('no_hp_wali', $data->no_hp_wali) }}"
                                                    name="no_hp_wali" id="no_hp_wali"
                                                    class="form-control @error('no_hp_wali') is-invalid @enderror"
                                                    placeholder="No. Telp Wali">
                                                @error('no_hp_wali')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="dtiks">Sudah Masuk DTIKS</label>
                                                <select name="dtiks" id="dtiks"
                                                    class="form-control @error('dtiks') is-invalid @enderror">
                                                    <option value="Sudah"
                                                        {{ $data->dtiks === 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                                    <option value="Belum"
                                                        {{ $data->dtiks === 'Belum' ? 'selected' : '' }}>Belum</option>
                                                </select>
                                                @error('dtiks')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="bantuan_pernah_diterima">Bantuan Yang Pernah Diterima</label>
                                                <select name="bantuan_pernah_diterima" id="bantuan_pernah_diterima"
                                                    class="form-control select2 @error('bantuan_pernah_diterima') is-invalid @enderror"
                                                    data-placeholder="-- Pilih Jenis Bantuan --">
                                                    @foreach ($bantuans as $bantuan)
                                                        <option value="{{ $bantuan->id }}"
                                                            {{ $bantuan->id === $data->bantuan_id ? 'selected' : '' }}>
                                                            {{ $bantuan->bantuan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('bantuan_pernah_diterima')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="hasil_asesmen">Hasil Asesment</label>
                                                <textarea name="hasil_asesmen" id="hasil_asesmen" cols="30" rows="3"
                                                    class="form-control @error('hasil_asesmen') is-invalid @enderror" placeholder="Hasil Asesment">{{ old('hasil_asesmen', $data->hasil_asesmen) }}</textarea>
                                                @error('hasil_asesmen')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="rekomendasi">Rekomendasil</label>
                                                <textarea name="rekomendasi" id="rekomendasi" cols="30" rows="3"
                                                    class="form-control @error('rekomendasi') is-invalid @enderror" placeholder="Rekomendasil">{{ old('rekomendasi', $data->rekomendasi) }}</textarea>
                                                @error('rekomendasi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="intervensi">Intervensi</label>
                                                <textarea name="intervensi" id="intervensi" cols="30" rows="3"
                                                    class="form-control @error('intervensi') is-invalid @enderror" placeholder="Intervensi">{{ old('intervensi', $data->intervensi) }}</textarea>
                                                @error('intervensi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-3 mb-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tgl_pelayanan">Tgl Pelayanan</label>
                                                <input type="text"
                                                    value="{{ old('tgl_pelayanan', $data->tgl_pelayanan) }}"
                                                    name="tgl_pelayanan" id="tgl_pelayanan"
                                                    class="form-control datePicker @error('tgl_pelayanan') is-invalid @enderror"
                                                    placeholder="Tanggal Pelayanan" value="{{ date('Y-m-d') }}">
                                                @error('tgl_pelayanan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_ktp">Foto KTP</label>
                                                <input type="file" name="foto_ktp" id="foto_ktp"
                                                    class="form-control @error('foto_ktp') is-invalid @enderror"
                                                    accept="image/png, image/jpeg, image/jpg">
                                                @error('foto_ktp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_diri">Foto Diri</label>
                                                <input type="file" name="foto_diri" id="foto_diri"
                                                    class="form-control @error('foto_diri') is-invalid @enderror"
                                                    accept="image/png, image/jpeg, image/jpg">
                                                @error('foto_diri')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="foto_kk">Foto KK</label>
                                                <input type="file" name="foto_kk" id="foto_kk"
                                                    class="form-control @error('foto_kk') is-invalid @enderror"
                                                    accept="image/png, image/jpeg, image/jpg">
                                                @error('foto_kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                    <hr>
                                    <div class="row float-end">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                <i class="align-middle" data-feather="save"></i> Update Data Registrasi
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
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
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
