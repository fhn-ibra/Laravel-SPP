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
                <td>Nama Petugas</td>
                <td>Nama Siswa</td>
                <td>Tgl. Bayar</td>
                <td>Bulan Dibayar</td>
                <td>Tahun Dibayar</td>
                <td>Harga SPP </td>
                <td>Jumlah Bayar</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($data as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->petugas->nama_petugas }}</td>
                <td>{{ $data->siswa->nama }} ({{ $data->nisn }})</td>
                <td>{{ $data->tgl_bayar }}</td>
                <td>{{ $data->bulan_dibayar }}</td>
                <td>{{ $data->tahun_dibayar }}</td>
                <td>{{ $data->siswa->spp->nominal }}</td>
                <td>{{ $data->jumlah_bayar }}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"
                        data-id="{{ $data->id_pembayaran }}"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('pembayaran-delete') }}">
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
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" value=''>Ya</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('pembayaran-save') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data Pembayaran
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_petugas" value="{{ Auth::user()->id_petugas }}">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Pilih Siswa</label>
                        <select class="form-control" name="nisn">
                            @foreach ($siswa as $item)
                            <option value="{{ $item->nisn }}">{{ $item->nama }} / {{ $item->nisn }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Bayar</label>
                        <input type="date" class="form-control" name="tgl_bayar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan Dibayar</label>
                        <input type="text" class="form-control" name="bulan_dibayar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun Dibayar</label>
                        <input type="number" class="form-control" name="tahun_dibayar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Dibayar</label>
                        <input type="number" class="form-control" name="jumlah_bayar">
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
