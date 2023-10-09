@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Data Pegawai
                        </div>
                        <div class="float-end">
                            <a href="{{ route('karyawan.index') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('/storage/karyawan/' . $karyawan->foto) }}" class="rounded"
                                            style="width: 250px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Nomor Induk Karyawan</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->nik }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Jabatan</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->jabatan }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Nama Karyawan</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->nama }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Email</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->email }}</th>
                                                </tr>
                                                <tr>
                                                    <td>No. Telepon</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->telp }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <th>{{ $karyawan->alamat }}</th>
                                                </tr>
                                            </table>
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
