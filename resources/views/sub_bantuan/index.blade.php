@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Sub Bantuan
                        </div>
                        <div class="float-end">
                            <a href="{{ route('sub-bantuan.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data Sub Bantuan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bantuan</th>
                                        <th>Sub Bantuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_bantuans as $i => $sub_bantuan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sub_bantuan->bantuan->bantuan }}</td>
                                            <td>{{ $sub_bantuan->sub_bantuan }}</td>
                                            <td>
                                                <form action="{{ route('sub-bantuan.destroy', $sub_bantuan) }}"
                                                    method="post" style="display: inline;">
                                                    <a href="{{ route('sub-bantuan.edit', $sub_bantuan) }}"
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
                            {{ $sub_bantuans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
