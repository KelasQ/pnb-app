@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Update Profil
                        </div>
                        <div class="float-end">
                            <a href="{{ route('profil') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if (Auth::user()->foto)
                                            <img src="{{ asset('storage/users/' . Auth::user()->foto) }}"
                                                class="imagePreviewProfil rounded img-fluid mt-3 d-block"
                                                style="width: 200px">
                                        @else
                                            <img src="{{ asset('img/profile.png') }}"
                                                class="imagePreviewProfil rounded img-fluid mt-3" style="width: 200px">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <form action="{{ route('update-profil', Auth::user()->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" id="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="Nama Lengkap"
                                                    value="{{ old('nama', Auth::user()->nama) }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Alamat Email"
                                                    value="{{ old('email', Auth::user()->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="telp">Telp</label>
                                                <input type="telp" name="telp" id="telp"
                                                    class="form-control @error('telp') is-invalid @enderror"
                                                    placeholder="Telp" value="{{ old('telp', Auth::user()->telp) }}">
                                                @error('telp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="foto">Foto</label>
                                                <input type="file" name="foto" id="foto"
                                                    class="form-control @error('foto') is-invalid @enderror inputImageProfil"
                                                    placeholder="Foto" accept="image/png, image/jpeg, image/jpg"
                                                    onchange="previewImageProfil()">
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="float-end mt-2">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="align-middle" data-feather="save"></i> Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function previewImageProfil() {
            const inputImageProfil = document.querySelector('.inputImageProfil');
            const imagePreviewProfil = document.querySelector('.imagePreviewProfil');

            imagePreviewProfil.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(inputImageProfil.files[0]);
            oFReader.onload = function(oFREvent) {
                imagePreviewProfil.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
