<div class="form-group">
    <label for="role">Nama Role</label>
    <input type="text" name="role" id="role" class="form-control mt-1 @error('role') is-invalid @enderror"
        placeholder="Nama Role" value="{{ old('role', $role->role) }}">
    @error('role')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
