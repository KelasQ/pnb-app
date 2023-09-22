<div class="form-group">
    <label for="layanan">Nama Layanan</label>
    <input type="text" name="layanan" id="layanan" class="form-control mt-1 @error('layanan') is-invalid @enderror"
        placeholder="Nama Layanan" value="{{ old('layanan', $layanan->layanan) }}">
    @error('layanan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
