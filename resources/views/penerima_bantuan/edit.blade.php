@extends('layout/app')

@section('content')
    {{-- {{ dd($sub_klaster->id) }} --}}
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Form Update Data Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('peserta.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                {{-- <form action="{{ route('penerima-bantuan.update', $penerima_bantuan->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    @include('penerima_bantuan._form')
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
