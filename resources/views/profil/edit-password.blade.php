@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Update Paswsword
                        </div>
                        <div class="float-end">
                            <a href="{{ route('profil') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('update-password', Auth::user()->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="password_confirmation">Ulangi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Ulangi Password" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
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
