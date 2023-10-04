@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Data SKA
                        </div>
                        <div class="float-end">
                            <a href="{{ route('ska.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <table class="table table-hover">
                                    <tr>
                                        <td>
                                            <small>Jenis SKA</small><br>
                                            <strong>{{ $ska->jenis_ska }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Deskripsi</small><br>
                                            <strong>{{ $ska->deskripsi }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <small>Dokumentasi</small><br>
                                            <img src="{{ asset('/storage/dokumentasi/ska/' . $ska->dokumentasi) }}"
                                                class="rounded" style="width: 200px">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
