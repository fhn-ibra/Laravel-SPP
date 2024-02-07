@extends('layouts.table')


@section('tambah-data')
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i>
        Tambah</button>
@endsection

@section('tabel')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td width=5%>No</td>
                <td width=23%>Username</td>
                <td width=42%>Nama Petugas</td>
                <td>Level</td>
                <td width=10%>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($data as $petugas)
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $petugas->username }}</td>
                <td>{{ $petugas->nama_petugas }}</td>
                <td>{{ $petugas->level }}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"
                        data-id="{{ $petugas->id_petugas }}"><i class="fas fa-trash"></i></button>
                    </form>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"
                        data-id= "{{ $petugas->id_petugas }}" data-uname="{{ $petugas->username }}"
                        data-nama = "{{ $petugas->nama_petugas }}" data-level="{{ $petugas->level }}"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('petugas-delete') }}">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Apakah yakin ingin menghapus?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id_petugas" id="id">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" value=''>Ya</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('petugas-save') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data Petugas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Petugas</label>
                        <input type="text" class="form-control" name="nama_petugas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Level</label>
                        <select class="form-control" name="level">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('petugas-edit') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Edit Petugas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_petugas" id="id">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Petugas</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" class="form-control" name="uname" id="uname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Level</label>
                        <select class="form-control" name="level">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#modalDelete').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('.modal-title').text('Apakah yakin ingin menghapus?');
                modal.find('#id').val(id);
            });
        });

        $(document).ready(function () {
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var Id = button.data('id');
            var uname = button.data('uname');
            var nama = button.data('nama');
            var level = button.data('level');
            var modal = $(this);
            modal.find('#id').val(Id);
            modal.find('#nama').val(nama);
            modal.find('#uname').val(uname);
        });
    });
    </script>
@endsection
