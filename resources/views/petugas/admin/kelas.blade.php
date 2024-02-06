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
                <td width=20%>Aksi</td>
            </tr>
        </thead>
        @foreach ($data as $kelas)
            <?php $no = 1; ?>
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>{{ $kelas->kompetensi_keahlian }}</td>
                <td>
                    <form id="deleteForm" action="{{ route('kelas-delete') }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        {{-- <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"><i
                                class="fas fa-trash"></i></button> --}}
                    </form>
                    <button class="btn btn-warning" style="display: inline-block;"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

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
    {{-- udushdusa --}}
    {{-- <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" value=''>Submit</button>
                </div>
            </form>
        </div>
    </div> --}}

    <script>
        $(function() {
            $('#modalAdd').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var recipient = button.data('link')
                var modal = $(this)
                modal.find('.modal-content').attr('action', recipient)
            })
        });
    </script>

    {{-- <script>
        $(function() {
            $('#modalDelete').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var recipient = button.data('link')
                var modal = $(this)
                modal.find('.modal-content').attr('action', recipient)
            })
        }); --}}
    </script>
    
@endsection
