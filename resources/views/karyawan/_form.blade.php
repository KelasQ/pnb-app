<div class="row">
    <div class="col-md-6">
        <label for="nik">Nomor Induk Pegawai</label>
        <input type="text" name="nik" id="nik" class="form-control mt-1 @error('nik') is-invalid @enderror"
            placeholder="Nomor Induk Pegawai" value="{{ old('nik', $karyawan->nik) }}">
        @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="nama">Nama Pegawai</label>
        <input type="text" name="nama" id="nama"
            class="form-control mt-1 @error('nama') is-invalid @enderror" placeholder="Nama Pegawai"
            value="{{ old('nama', $karyawan->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="email">Alamat Email</label>
        <input type="email" name="email" id="email"
            class="form-control mt-1 @error('email') is-invalid @enderror" placeholder="Alamat Email"
            value="{{ old('email', $karyawan->email) }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="telp">No. Telepon</label>
        <input type="telp" name="telp" id="telp"
            class="form-control mt-1 @error('telp') is-invalid @enderror" placeholder="No. Telepon"
            value="{{ old('telp', $karyawan->telp) }}">
        @error('telp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        @if ($karyawan->foto)
            <img src="{{ asset('storage/karyawan/' . $karyawan->foto) }}"
                class="imagePreview rounded img-fluid mt-3 d-block" style="width: 100px">
        @else
            <img src="{{ asset('img/profile.png') }}" class="imagePreview img-fluid rounded mt-3" style="width: 100px;">
        @endif
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <label for="foto">Foto Profil</label>
                <input type="file" name="foto" id="foto"
                    class="form-control mt-1 inputImageFile @error('foto') is-invalid @enderror"
                    placeholder="Foto Profil" value="{{ old('foto') }}" accept="image/png, image/jpeg, image/jpg"
                    onchange="previewImage()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan"
                    class="form-control mt-1 @error('jabatan') is-invalid @enderror" placeholder="Jabatan"
                    value="{{ old('jabatan', $karyawan->jabatan) }}">
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" id="alamat" class="form-control mt-1 @error('alamat') is-invalid @enderror"
        placeholder="Alamat" value="{{ old('alamat', $karyawan->alamat) }}">
    @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="float-end mt-2">
    <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
        {{ $submit }}</button>
</div>
