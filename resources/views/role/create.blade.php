<div class="mb-3">
    <label for="i-nama_field">Nama Field</label>
    <input name="nama_field" type="text" class="form-control" id="i-nama_field" value="{{old('nama_field')}}">
    @error('nama_field')
        <span class="invalid-feedback d-block">{{$message}}</span>
    @enderror
</div>