@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Karyawan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data Karyawan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Telp</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawans as $karyawan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $karyawan->nik }}</td>
                                            <td>{{ $karyawan->nama }}</td>
                                            <td>{{ $karyawan->telp }}</td>
                                            <td>{{ $karyawan->jabatan }}</td>
                                            <td>
                                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="post"
                                                    style="display: inline;">
                                                    <a href="{{ route('karyawan.show', $karyawan->id) }}"
                                                        class="btn btn-info btn-sm" title="Show Data"><i
                                                            class="align-middle" data-feather="eye"></i></a>
                                                    <a href="{{ route('karyawan.edit', $karyawan->id) }}"
                                                        class="btn btn-warning btn-sm" title="Edit Data"><i
                                                            class="align-middle" data-feather="edit"></i></a>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" title="Hapus Data"
                                                        class="btn btn-danger btn-sm btnHapusData"
                                                        onclick="return confirm('Yakin Ingin Dihapus ?')"><i
                                                            class="align-middle" data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $karyawans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
