@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Data Laporan Residensial</h3>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: -30px;">
                            <div class="col-md-6 offset-md-3">
                                <form action="{{ url('lap-residensial') }}" method="post">
                                    @method('POST')
                                    @csrf
                                    <div class="input-group mb-3">
                                        <select class="form-select flex-grow-1" name="tindakan" id="tindakan">
                                            <option value="">-- Pilih Jenis Tindakan --</option>
                                            <option value="Program/Layanan">Program/Layanan</option>
                                            <option value="Terminasi">Terminasi</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit"><i class="align-middle"
                                                data-feather="file-text"></i> Tampilkan Laporan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if ($data)
                            <div class="row">
                                <hr>
                                @foreach ($data as $key => $value)
                                    {{-- @foreach ($value as $row) --}}
                                    {{ dd($value['items']) }}
                                    {{-- @endforeach --}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
