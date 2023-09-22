@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <div class="float-start text-white">
                            Data Layanan
                        </div>
                        <div class="float-end">
                            <a href="{{ url('layanan/create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data Layanan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Layanan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan as $i => $layanan)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $layanan->layanan }}</td>
                                            <td>
                                                <form action="{{ url('layanan/' . $layanan->id) }}" method="post"
                                                    style="display: inline;">
                                                    <a href="{{ url('layanan/' . $layanan->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm" title="Edit Data"><i
                                                            class="align-middle" data-feather="edit"></i></a>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" title="Hapus Data"
                                                        class="btn btn-danger btn-sm btnHapusData"><i class="align-middle"
                                                            data-feather="trash-2"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
