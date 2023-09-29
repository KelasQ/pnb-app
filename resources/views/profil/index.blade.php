@extends('layout/app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Detail Profil
                        </div>
                        <div class="float-end">
                            <a href="{{ route('edit-profil', Auth::user()->id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="edit"></i>
                                Update Profil</a> |
                            <a href="{{ route('edit-password', Auth::user()->id) }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="key"></i>
                                Update Password</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('/storage/users/' . Auth::user()->foto) }}" class="rounded"
                                            style="width: 200px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Role / Level</td>
                                                    <td>:</td>
                                                    <th>{{ Auth::user()->role->role }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <th>{{ Auth::user()->nama }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <th>{{ Auth::user()->email }}</th>
                                                </tr>
                                                <tr>
                                                    <td>Telp</td>
                                                    <td>:</td>
                                                    <th>{{ Auth::user()->telp }}</th>
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
