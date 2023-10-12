@extends('layout.app')
@push('style')
    <style>
        .sm {
            font-size: 10px;
            color: rgba(0, 0, 0, .5)
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Sistem Pelayanan Dan Rehabilitasi Sosial <br> Sentra "Bahagia" Di Medan</h1>
                <p>JL. Williem Iskandar No. 377 Medan 20222 Telp. 061 - 6613305</p>
                <hr>
            </div>
        </div>
        <div class="row">
            @if (Str::lower(Auth::user()->role->role) === 'admin')
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $users }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Admin</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $roles }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Roles/Level</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $klaster }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Klaster</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $subklaster }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Sub Klaster</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $kasus }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Kasus</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $bantuan }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Bantuan</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $layanan }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Layanan</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $ska }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data SKA</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (Str::lower(Auth::user()->role->role) === 'pokja 1')
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $peserta }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Peserta</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="check-square"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (Str::lower(Auth::user()->role->role) === 'pokja 2')
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $program }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Layanan/Tindakan</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="check-square"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (Str::lower(Auth::user()->role->role) === 'pokja 3')
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $karyawan }} <span class="sm">Rows</span></h3>
                                    <p class="mb-2">Data Pegawai</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
