@extends('admin.layout')

@section('content')

    <h4 class="mt-5">Data Admin</h4>

    <a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">Back</a>

{{--    <a href="{{ route('admin.undoall') }}" type="button" class="btn btn-warning rounded-3">Undo All Data</a>--}}

    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
            data-bs-target="#undoAll">
        Undo All Data
    </button>

    <div class="modal fade" id="undoAll" tabindex="-1"
         aria-labelledby="undoAllLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="undoAllLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.undoall') }}">
                    @csrf
                    <div class="modal-body">
                        Apakah anda yakin ingin mengembalikan semua data?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ $message }}
        </div>
    @endif

    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_admin }}</td>
                <td>{{ $data->nama_admin }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->username }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapusModal{{ $data->id_admin }}">
                        Hapus
                    </button>

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#undoModal{{ $data->id_admin }}">
                        Undo
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_admin }}" tabindex="-1"
                         aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('admin.deletepermanent', $data->id_admin) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="undoModal{{ $data->id_admin }}" tabindex="-1"
                         aria-labelledby="undoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="undoModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('admin.undo', $data->id_admin) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin mengembalikan data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
