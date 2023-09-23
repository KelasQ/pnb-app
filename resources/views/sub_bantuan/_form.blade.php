<div class="form-group">
    <label for="bantuan_id">Bantuan</label>
    <select name="bantuan_id" id="bantuan_id" class="form-control @error('bantuan_id') is-invalid @enderror">
        <option value="">-- Pilih Bantuan --</option>
        @foreach ($bantuan as $bantuan)
            <option value="{{ $bantuan->id }}" {{ $bantuan->id == $sub_bantuan->bantuan_id ? 'selected' : '' }}>
                {{ $bantuan->bantuan }}</option>
        @endforeach
    </select>
    @error('bantuan_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mt-3">
    <label for="sub_bantuan">Sub Bantuan</label>
    <input type="text" name="sub_bantuan" id="sub_bantuan"
        class="form-control mt-1 @error('sub_bantuan') is-invalid @enderror" placeholder="Sub Bantuan"
        value="{{ old('sub_bantuan', $sub_bantuan->sub_bantuan) }}">
    @error('sub_bantuan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
