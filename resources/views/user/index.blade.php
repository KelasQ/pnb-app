@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Data Users
                        </div>
                        <div class="float-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"><i class="align-middle"
                                    data-feather="plus-circle"></i>
                                Tambah Data User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">No</th>
                                        <th>Foto</th>
                                        <th>Role</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/users/' . $user->foto) }}" class="rounded"
                                                    style="width: 50px">
                                            </td>
                                            <td>{{ $user->role->role }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telp }}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                    style="display: inline;">
                                                    <a href="{{ route('user.edit', $user->id) }}"
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
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
