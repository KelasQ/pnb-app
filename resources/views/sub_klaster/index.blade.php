@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Sub Klaster
                        </div>
                        <div class="float-end">
                            <a href="{{ route('sub-klaster.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data Sub Klaster</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Klaster</th>
                                        <th>Sub Klaster</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_klasters as $i => $sub_klaster)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sub_klaster->klaster->klaster }}</td>
                                            <td>{{ $sub_klaster->sub_klaster }}</td>
                                            <td>
                                                <form action="{{ route('sub-klaster.destroy', $sub_klaster) }}"
                                                    method="post" style="display: inline;">
                                                    <a href="{{ route('sub-klaster.edit', $sub_klaster) }}"
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
                            {{ $sub_klasters->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
