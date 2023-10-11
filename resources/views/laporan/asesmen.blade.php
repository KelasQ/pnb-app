@extends('layout.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Data Laporan Asesmen</h3>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: -30px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" id="jenis-laporan">
                                                <option value="">-- Pilih Jenis Laporan --</option>
                                                <option value="kota">Berdasarkan Kab/Kota</option>
                                                <option value="kasus">Berdasrkan Sumber Kasus</option>
                                                <option value="klaster">Berdasrkan Klaster</option>
                                                <option value="alatbantu">Berdasrkan Jenis Alat Bantu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-kota d-none">
                                            <form action="{{ route('lap-asesmen-by-kota') }}" method="post"
                                                target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <select class="form-select select2" name="provinsi" id="provinsi"
                                                        style="width: 200px;">
                                                        <option value="">-- Pilih Provinsi --</option>
                                                        @foreach ($provinsi as $prov)
                                                            <option value="{{ $prov->kode }}">{{ $prov->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-select select2" name="kota" id="kota"
                                                        style="width: 250px;" disabled>
                                                        <option></option>
                                                    </select>
                                                    <button class="btn btn-primary" type="submit">
                                                        <i class="align-middle" data-feather="file-text"></i> Tampilkan
                                                        Laporan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-kasus d-none">
                                            <form action="{{ route('lap-asesmen-by-kasus') }}" method="post"
                                                target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <select class="form-select" name="kasus_id" id="kasus">
                                                        <option value="">-- Pilih Sumber Kasus --</option>
                                                        @foreach ($kasus as $kasus)
                                                            <option value="{{ $kasus->id }}">{{ $kasus->kasus }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-primary" type="submit"><i class="align-middle"
                                                            data-feather="file-text"></i> Tampilkan Laporan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-klaster d-none">
                                            <form action="{{ route('lap-asesmen-by-klaster') }}" method="post"
                                                target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <select class="form-select" name="klaster_id" id="klaster">
                                                        <option value="">-- Pilih Jenis Klaster --</option>
                                                        @foreach ($klaster as $klaster)
                                                            <option value="{{ $klaster->id }}">{{ $klaster->klaster }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-primary" type="submit"><i class="align-middle"
                                                            data-feather="file-text"></i> Tampilkan Laporan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-alat-bantu d-none">
                                            <form action="{{ route('lap-asesmen-by-alat-bantu') }}" method="post"
                                                target="_blank">
                                                @csrf
                                                <div class="input-group">
                                                    <select class="form-select" name="alatbantu" id="alat-bantu">
                                                        <option value="">-- Pilih Jenis Alat Bantu --</option>
                                                        <option value="KURSI RODA">KURSI RODA</option>
                                                        <option value="TONGKAT">TONGKAT</option>
                                                        <option value="WALKER">WALKER</option>
                                                        <option value="MOTOR TIGA RODA">MOTOR TIGA RODA</option>
                                                        <option value="LAIN-LAIN">LAIN-LAIN</option>
                                                    </select>
                                                    <button class="btn btn-primary" type="submit"><i class="align-middle"
                                                            data-feather="file-text"></i> Tampilkan Laporan</button>
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
    </div>
@endsection
@push('script')
    <script>
        $('.select2').select2();

        $('#jenis-laporan').change(function(e) {
            e.preventDefault();
            const value = $(this).val();
            if (value == '') {
                $('.form-kota').addClass('d-none');
                $('.form-kasus').addClass('d-none');
                $('.form-klaster').addClass('d-none');
                $('.form-alat-bantu').addClass('d-none');
            }
            if (value == 'kota') {
                $('.form-kota').removeClass('d-none');
                $('.form-kasus').addClass('d-none');
                $('.form-klaster').addClass('d-none');
                $('.form-alat-bantu').addClass('d-none');
            }
            if (value == 'kasus') {
                $('.form-kasus').removeClass('d-none');
                $('.form-kota').addClass('d-none');
                $('.form-klaster').addClass('d-none');
                $('.form-alat-bantu').addClass('d-none');
            }
            if (value == 'klaster') {
                $('.form-klaster').removeClass('d-none');
                $('.form-kota').addClass('d-none');
                $('.form-kasus').addClass('d-none');
                $('.form-alat-bantu').addClass('d-none');
            }
            if (value == 'alatbantu') {
                $('.form-alat-bantu').removeClass('d-none');
                $('.form-kota').addClass('d-none');
                $('.form-kasus').addClass('d-none');
                $('.form-klaster').addClass('d-none');
            }
        });

        function onChangeWilayah(url, kode, name, placeholder) {
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    kode: kode
                },
                success: function(data) {
                    let select = $('#' + name);
                    select.empty();
                    select.append(`<option>${placeholder}</option>`);
                    $.each(data, function(key, value) {
                        select.append(`<option value="${value.kode}">${value.nama}</option>`);
                    });
                }
            });
        }
        $('#provinsi').change(function() {
            var kode = $(this).val();
            var url = "{{ url('getDataKabupaten') }}";
            var placeholder = "-- Pilih Kota/Kabupaten --";
            var name = "kota";
            onChangeWilayah(url, kode, name, placeholder);
            $('#kota').removeAttr('disabled');
        });
    </script>
@endpush
