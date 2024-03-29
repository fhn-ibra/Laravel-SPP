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
                <td width=23%>Nama Kelas</td>
                <td width=42%>Jurusan</td>
                <td width=10%>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($data as $kelas)
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>{{ $kelas->kompetensi_keahlian }}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"
                        data-id="{{ $kelas->id_kelas }}"><i class="fas fa-trash"></i></button>
                    </form>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"
                        data-id= "{{ $kelas->id_kelas }}" data-nama="{{ $kelas->nama_kelas }}"
                        data-kom = "{{ $kelas->kompetensi_keahlian }}"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('kelas-delete') }}">
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
                <input type="hidden" name="id_kelas" id="kelasId">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" value=''>Ya</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('kelas-save') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data Kelas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kompetensi Keahlian</label>
                        <input type="text" class="form-control" name="kompetensi_keahlian">
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
            <form class="modal-content" method="post" action="{{ route('kelas-edit') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Edit Kelas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_kelas" id="id">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kompetensi Keahlian</label>
                        <input type="text" class="form-control" name="kompetensi_keahlian" id="kom">
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
                var kelasid = button.data('id');
                var modal = $(this);
                modal.find('.modal-title').text('Apakah yakin ingin menghapus?');
                modal.find('#kelasId').val(kelasid);
            });
        });

        $(document).ready(function () {
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var Id = button.data('id');
            var Nama = button.data('nama');
            var Kom = button.data('kom');
            var modal = $(this);
            modal.find('#id').val(Id);
            modal.find('#nama').val(Nama);
            modal.find('#kom').val(Kom);
        });
    });
    </script>
@endsection
