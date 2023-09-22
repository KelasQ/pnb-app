<div class="form-group">
    <label for="klaster">Nama Klaster</label>
    <input type="text" name="klaster" id="klaster" class="form-control mt-1 @error('klaster') is-invalid @enderror"
        placeholder="Nama Klaster" value="{{ old('klaster', $klaster->klaster) }}">
    @error('klaster')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
