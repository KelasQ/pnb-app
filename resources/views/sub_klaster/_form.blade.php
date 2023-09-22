<div class="form-group">
    <label for="klaster_id">Klaster</label>
    <select name="klaster_id" id="klaster_id" class="form-control @error('klaster_id') is-invalid @enderror">
        @if ($subKlaster)
            <option value="{{ $subKlaster->klaster_id }}">{{ $subKlaster->klaster }}</option>
        @else
            <option value="">-- Pilih Klaster --</option>
        @endif
        @foreach ($klaster as $klaster)
            <option value="{{ $klaster->id }}">{{ $klaster->klaster }}</option>
        @endforeach
    </select>
    @error('klaster_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group mt-3">
    <label for="sub_klaster">Sub Klaster</label>
    <input type="text" name="sub_klaster" id="sub_klaster"
        class="form-control mt-1 @error('sub_klaster') is-invalid @enderror" placeholder="Sub Klaster"
        value="{{ old('sub_klaster', $subKlaster->sub_klaster) }}">
    @error('sub_klaster')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="float-end mt-2">
        <button type="submit" class="btn btn-success"><i class="align-middle" data-feather="save"></i>
            {{ $submit }}</button>
    </div>
</div>
