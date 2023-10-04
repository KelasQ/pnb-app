@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Edit Data SKA
                        </div>
                        <div class="float-end">
                            <a href="{{ route('ska.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('ska.update', $ska->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="jenis_ska">Jenis SKA</label>
                                        <select name="jenis_ska" id="jenis_ska"
                                            class="form-control @error('jenis_ska') is-invalid @enderror">
                                            <option value="SKA CAFE COMBUR"
                                                {{ $ska->jenis_ska == 'SKA CAFE COMBUR' ? 'selected' : '' }}>SKA CAFE COMBUR
                                            </option>
                                            <option value="SKA KELONTONG"
                                                {{ $ska->jenis_ska == 'SKA KELONTONG' ? 'selected' : '' }}>SKA KELONTONG
                                            </option>
                                            <option value="SKA SALON"
                                                {{ $ska->jenis_ska == 'SKA SALON' ? 'selected' : '' }}>SKA SALON</option>
                                            <option value="SKA DESAIN GRAFIS"
                                                {{ $ska->jenis_ska == 'SKA DESAIN GRAFIS' ? 'selected' : '' }}>SKA DESAIN
                                                GRAFIS</option>
                                            <option value="SKA KULINER"
                                                {{ $ska->jenis_ska == 'SKA KULINER' ? 'selected' : '' }}>SKA KULINER
                                            </option>
                                        </select>
                                        @error('jenis_ska')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="deskripsi">Deskripsi SKA</label>
                                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3"
                                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi SKA">{{ old('deskripsi', $ska->deskripsi) }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="dokumentasi">Dokumentasi</label>
                                        <input type="file" name="dokumentasi" id="dokumentasi"
                                            class="form-control @error('dokumentasi') is-invalid @enderror">
                                        @error('dokumentasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="float-end mt-2">
                                        <button type="submit" class="btn btn-success"><i class="align-middle"
                                                data-feather="save"></i> Update Data SKA</button>
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
