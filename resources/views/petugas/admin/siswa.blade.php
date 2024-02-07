@extends('layouts.table')


@section('tambah-data')
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i>
        Tambah</button>
@endsection

@section('tabel')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <td width="5%">No</td>
                <td>NISN</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Alamat</td>
                <td>No. Telp</td>
                <td width="15%">Nominal SPP</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <?php $no = 1; ?>
        @foreach ($data as $siswa)
            <tr>

                <td>{{ $no++ }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->no_telp }}</td>
                <td>{{ $siswa->spp->nominal }}</td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete"
                        data-nisn="{{ $siswa->nisn }}"><i class="fas fa-trash"></i></button>
                    </form>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"
                        data-nisn= "{{ $siswa->nisn }}" data-nis="{{ $siswa->nis }}" data-nama="{{ $siswa->nama }}"
                        data-kelas = "{{ $siswa->id_kelas }}" data-alamat="{{ $siswa->alamat }}" data-notelp="{{ $siswa->no_telp }}" data-spp="{{ $siswa->id_spp }}"><i class="fas fa-pen"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('modal')
    <div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('siswa-delete') }}">
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
                <input type="hidden" name="nisn" id="nisn">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" value=''>Ya</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-md">
            <form class="modal-content" method="post" action="{{ route('siswa-save') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">NISN</label>
                        <input type="text" class="form-control" name="nisn">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">NIS</label>
                        <input type="text" class="form-control" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kelas</label>
                        <select class="form-control" name="id_kelas">
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Telp</label>
                        <input type="text" class="form-control" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nominal SPP</label>
                        <select class="form-control" name="id_spp">
                            @foreach ($spp as $item)
                            <option value="{{ $item->id_spp }}">{{ $item->nominal }}</option>
                            @endforeach
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
            <form class="modal-content" method="post" action="{{ route('siswa-edit') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Edit Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nisn" id="nisn">

                    <div class="form-group">
                        <label for="exampleInputPassword1">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kelas</label>
                        <select class="form-control" name="id_kelas">
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. Telp</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nominal SPP</label>
                        <select class="form-control" name="id_spp">
                            @foreach ($spp as $item)
                            <option value="{{ $item->id_spp }}">{{ $item->nominal }}</option>
                            @endforeach
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
                var id = button.data('nisn');
                var modal = $(this);
                modal.find('.modal-title').text('Apakah yakin ingin menghapus?');
                modal.find('#nisn').val(id);
            });
        });

        $(document).ready(function () {
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var nisn = button.data('nisn');
            var nis = button.data('nis');
            var nama = button.data('nama');
            var alamat = button.data('alamat');
            var notelp = button.data('notelp');
            var modal = $(this);
            modal.find('#nisn').val(nisn);
            modal.find('#nis').val(nis);
            modal.find('#nama').val(nama);
            modal.find('#alamat').val(alamat);
            modal.find('#no_telp').val(notelp);
        });
    });
    </script>
@endsection
