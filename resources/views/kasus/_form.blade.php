<div class="form-group">
    <label for="kasus">Nama Kasus</label>
    <input type="text" name="kasus" id="kasus" class="form-control mt-1 @error('kasus') is-invalid @enderror"
        placeholder="Nama Kasus" value="{{ old('kasus', $case->kasus) }}">
    @error('kasus')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
