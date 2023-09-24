@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Edit Data User
                        </div>
                        <div class="float-end">
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ route('user.update', $user->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        <select name="role_id" id="role_id"
                                            class="form-control @error('role_id') is-invalid @enderror">
                                            <option value="">-- Pilih Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                                    {{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama User</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control mt-1 @error('nama') is-invalid @enderror"
                                            placeholder="Nama User" value="{{ old('nama', $user->nama) }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Alamat Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control mt-1 @error('email') is-invalid @enderror"
                                                placeholder="Alamat Email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telp">No. Telepon</label>
                                            <input type="telp" name="telp" id="telp"
                                                class="form-control mt-1 @error('telp') is-invalid @enderror"
                                                placeholder="No. Telepon" value="{{ old('telp', $user->telp) }}">
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if ($user->foto)
                                                <img src="{{ asset('storage/users/' . $user->foto) }}"
                                                    class="user-foto-preview rounded img-fluid mt-3 d-block"
                                                    style="width: 100px">
                                            @else
                                                <img class="user-foto-preview rounded img-fluid mt-3" style="width: 100px">
                                            @endif
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="foto">Foto Profil</label>
                                                    <input type="file" name="foto" id="foto"
                                                        class="form-control mt-1 foto-user @error('foto') is-invalid @enderror"
                                                        placeholder="Foto Profil" value="{{ old('foto') }}"
                                                        accept="image/png, image/jpeg, image/jpg"
                                                        onchange="previewFotoUser()">
                                                    @error('foto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" id="username"
                                                        class="form-control mt-1 @error('username') is-invalid @enderror"
                                                        placeholder="Username"
                                                        value="{{ old('username', $user->username) }}">
                                                    @error('username')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-end mt-2">
                                        <button type="submit" class="btn btn-success"><i class="align-middle"
                                                data-feather="save"></i>
                                            {{ $submit }}</button>
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
