@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Peserta Penerima Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('peserta.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Input Data Penerima Bantuan</a>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $peserta)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $peserta->nik }}</td>
                                            <td>{{ $peserta->nama_ppks }}</td>
                                            <td>{{ date('d F Y', strtotime($peserta->tgl_pelayanan)) }}</td>
                                            <td>{{ date('d F Y', strtotime($peserta->tgl_asesmen)) }}</td>
                                            <td>
                                                <form action="{{ route('peserta.destroy', $peserta->id) }}" method="post"
                                                    style="display: inline;">
                                                    <a href="{{ route('peserta.show', $peserta->id) }}"
                                                        class="btn btn-info btn-sm" title="Show Data"><i
                                                            class="align-middle" data-feather="eye"></i></a>
                                                    <a href="{{ route('peserta.edit', $peserta->id) }}"
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
