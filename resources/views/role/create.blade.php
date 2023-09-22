@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="float-start text-white">
                            Tambah Data Role
                        </div>
                        <div class="float-end">
                            <a href="{{ url('role') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ url('role') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="role">Nama Role</label>
                                        <input type="text" name="role" id="role"
                                            class="form-control mt-1 @error('role') is-invalid @enderror"
                                            placeholder="Nama Role">
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="float-end mt-2">
                                            <button type="submit" class="btn btn-success"><i class="align-middle"
                                                    data-feather="save"></i> Simpan</button>
                                        </div>
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
