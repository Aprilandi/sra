@extends('templates.default')
@push('style')

@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Data Laporan</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-bottom:5px">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" style="text-align:right">
                            <form action="{{ route('lapor.index') }}" method="get">
                                {{ csrf_field() }}
                                Rumah Sakit :
                                <select name="RS" id="RS" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($rumahsakit as $row)
                                    <option
                                    @if(request()->rs == $row->id_rs)
                                    selected="selected"
                                    @endif
                                    value="{{ $row->id_rs }}">{{ $row->nama_rs }}</option>
                                    @endforeach
                                </select>
                                Kepolisian :
                                <select name="pl" id="pl" style="margin-right:20px">
                                    <option value="">Semua</option>
                                    @foreach($polisi as $row)
                                    <option
                                    @if(request()->pl == $row->id_pl)
                                    selected="selected"
                                    @endif
                                    value="{{ $row->id_pl }}">{{ $row->nama_pl }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left:10px"> <i class="fa fa-search"></i> Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <h4 class="card-title" style="display:inline-block;">Data Lapor</h4>
                    <a href="{{ route('lapor.create') }}" class="btn btn-info float-right mb-3">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>
                    <a href="{{ route('lapor.create') }}" class="btn btn-danger float-right mb-3" style="margin-right:15px">
                        <i class="fa fas fa-file-pdf"></i>
                        Cetak PDF
                    </a>


                    <div class="clearfix"></div>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rumah Sakit</th>
                                    <th>Kepolisian</th>
                                    <th>Pelapor</th>
                                    <th>Loc GPS</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $number = 1;
                                ?>
                                @foreach($lapor as $row)
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ !empty($row->id_rs) ? $row->rumahSakit->nama_rs:'' }}</td>
                                    <td>{{ !empty($row->id_pl) ? $row->kepolisian->nama_pl:'' }}</td>
                                    <td>{{ $row->pelapor }}</td>
                                    <td>{{ $row->loc_gps }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-light  btn-sm" id="detail" data-nama="{{ $row->pelapor }}" data-deskripsi="{{ $row->status }}" data-gambar="{{ asset('dokumen/lapor/'.$row->foto_bukti) }}">
                                            <i class="fa fa-eye"> </i>
                                        </button>
                                        <a href="{{ route('lapor.edit',  $row->id_lapor) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"> </i>
                                        </a>
                                        <button href="{{ route('lapor.destroy', $row->id_lapor) }}" class="btn btn-danger  btn-sm" id="delete" data-nama="{{ $row->pelapor }}">
                                            <i class="fa fa-trash"> </i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                $number++;
                                ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="deleteForm">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>

@include('lapor.detail')


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')
<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var name = $(this).data('nama');
        Swal.fire({
                title: "Anda yakin untuk menghapus laporan dari \"" + name + "\"?",
                text: "Setelah dihapus, data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    $('#deleteForm').attr('action', href);
                    $('#deleteForm').submit();
                }
            })
    });

    $('button#detail').on('click', function() {
        var deskripsi = $(this).data("deskripsi");
        var gambar = $(this).data("gambar");
        var nama = $(this).data("nama");

        $('#detail_nama').html(nama);
        $('#detail_deskripsi').html(deskripsi);
        $('#detail_gambar').attr("src", gambar);
        $("#detailLaporanModal").modal('show');


    });
</script>

@endpush