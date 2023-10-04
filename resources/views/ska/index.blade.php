@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data SKA
                        </div>
                        <div class="float-end">
                            <a href="{{ route('ska.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data SKA</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable" id="datatables-reponsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis SKA</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skas as $ska)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ska->jenis_ska }}</td>
                                            <td>
                                                <form action="{{ route('ska.destroy', $ska->id) }}" method="post"
                                                    style="display: inline;">
                                                    <a href="{{ route('ska.show', $ska->id) }}" class="btn btn-info btn-sm"
                                                        title="Show Data"><i class="align-middle"
                                                            data-feather="eye"></i></a>
                                                    <a href="{{ route('ska.edit', $ska->id) }}"
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
                            {{ $skas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
