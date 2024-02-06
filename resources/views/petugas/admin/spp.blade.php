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
                <td width=23%>Tahun SPP</td>
                <td width=42%>Nominal</td>
                <td width=10%>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($data as $spp)
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $spp->tahun }}</td>
                <td>{{ $spp->nominal }}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"
                        data-id="{{ $spp->id_spp }}"><i class="fas fa-trash"></i></button>
                    </form>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"
                        data-id= "{{ $spp->id_spp }}" data-tahun="{{ $spp->tahun }}"
                        data-nominal = "{{ $spp->nominal }}"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('spp-delete') }}">
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
                <input type="hidden" name="id_spp" id="id">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" value=''>Ya</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('spp-save') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data SPP
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun SPP</label>
                        <input type="number" class="form-control" name="tahun">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nominal Harga</label>
                        <input type="number" class="form-control" name="nominal">
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
            <form class="modal-content" method="post" action="{{ route('spp-edit') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Edit SPP
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_spp" id="id">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun SPP</label>
                        <input type="text" class="form-control" name="tahun" id="tahun">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nominal</label>
                        <input type="text" class="form-control" name="nominal" id="nominal">
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
            var tahun = button.data('tahun');
            var nominal = button.data('nominal');
            var modal = $(this);
            modal.find('#id').val(Id);
            modal.find('#tahun').val(tahun);
            modal.find('#nominal').val(nominal);
        });
    });
    </script>
@endsection
