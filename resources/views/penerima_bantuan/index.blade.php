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
                            <a href="{{ route('penerima-bantuan.create') }}" class="btn btn-primary btn-sm"><i
                                    class="align-middle" data-feather="plus-circle"></i>
                                Input Data Penerima Bantuan</a>
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
