<div class="form-group">
    <label for="bantuan">Nama Klaster</label>
    <input type="text" name="bantuan" id="bantuan" class="form-control mt-1 @error('bantuan') is-invalid @enderror"
        placeholder="Nama Klaster" value="{{ old('bantuan', $bantuan->bantuan) }}">
    @error('bantuan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
