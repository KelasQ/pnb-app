@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Registrasi Peserta Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('registrasi.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Input Data Registrasi Peserta Penerima Bantuan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama PPKS</th>
                                        <th>Tgl Pelayan</th>
                                        <th>Tgl Asesment</th>
                                        <th>Data Bantuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $registrasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $registrasi->nik }}</td>
                                            <td>{{ $registrasi->nama_ppks }}</td>
                                            <td>{{ date('d F Y', strtotime($registrasi->tgl_pelayanan)) }}</td>
                                            <td>{{ date('d F Y', strtotime($registrasi->tgl_asesmen)) }}</td>
                                            <td>
                                                <a href="{{ route('data-bantuan', $registrasi->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="align-middle" data-feather="check-circle"></i> Data Bantuan
                                                </a>
                                            </td>
                                            <td style="width: 110px;">
                                                <form action="{{ route('registrasi.destroy', $registrasi->id) }}"
                                                    method="post" style="display: inline;">
                                                    <a href="{{ route('registrasi.show', $registrasi->id) }}"
                                                        class="btn btn-info btn-sm" title="Show Data"><i
                                                            class="align-middle" data-feather="eye"></i></a>
                                                    <a href="{{ route('registrasi.edit', $registrasi->id) }}"
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
                            {{ $registrations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
