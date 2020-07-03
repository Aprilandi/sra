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
                    <li class="breadcrumb-item"><a href="{{ route('lapor.index') }}">Laporan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="mb-0 text-white float-left">
                        @if(isset($lapor->id_lapor))
                        Form Ubah Laporan
                        @else
                        Form Tambah Laporan
                        @endif
                    </h4>
                    <a href="{{ route('lapor.index') }}" class="btn btn-light btn-sm float-right"> <i class=" fas fa-arrow-left"> </i> Kembali</a>
                </div>
                <form class="form-horizontal r-separator" action=
                    @if(isset($lapor->id_lapor))
                    "{{ route('lapor.update', [$lapor->id_lapor]) }}"
                    @else
                    "{{ route('lapor.store') }}"
                    @endif
                    method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($lapor->id_lapor))
                    {{ method_field('PUT') }}
                    @endif
                    <div class="card-body"> 
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtIDRS" class="col-3 text-right control-label col-form-label">Rumah Sakit</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtIDRS" name="txtIDRS">
                                    <option value="" selected disabled hidden>Pilih Rumah Sakit</option>
                                    @foreach($rumahsakit as $lk)
                                    <option value="{{ $lk->id_rs }}" 
                                        @if(isset($lapor->id_rs))
                                        @if ($lk->id_rs == $lapor->id_rs))
                                        selected="selected"
                                        @endif
                                        @endif
                                        >{{ $lk->nama_rs }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtIDPL" class="col-3 text-right control-label col-form-label">Kepolisian</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtIDPL" name="txtIDPL">
                                    <option value="" selected disabled hidden>Pilih Kepolisian</option>
                                    @foreach($polisi as $jb)
                                    <option value="{{ $jb->id_pl }}" 
                                        @if(isset($lapor->id_pl))
                                        @if ($jb->id_pl == $lapor->id_pl))
                                        selected="selected"
                                        @endif
                                        @endif
                                        >{{ $jb->nama_pl }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtPelapor" class="col-3 text-right control-label col-form-label">Pelapor</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="text" class="form-control" id="txtPelapor" name="txtPelapor" placeholder="Masukkan Pelapor" value=
                                "{{ !empty($lapor->pelapor) ? $lapor->pelapor:'' }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtGPS" class="col-3 text-right control-label col-form-label">GPS</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="text" class="form-control" id="txtGPS" name="txtGPS" placeholder="Masukkan Pelapor" value=
                                "{{ !empty($lapor->loc_gps) ? $lapor->loc_gps:'' }}"
                                required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtStatus" class="col-3 text-right control-label col-form-label">Status</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <select class="form-control" id="txtStatus" name="txtStatus" required>
                                    <option value="" selected disabled hidden>Pilih Status</option>
                                    <option value="Belum" 
                                    @if(isset($lapor->status))
                                    @if($lapor->status == 'Belum')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Masih belum ditangani</option>
                                    <option value="Sedang"
                                    @if(isset($lapor->status))
                                    @if($lapor->status == 'Sedang')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Sudah ditangani</option>
                                    <option value="Sudah"
                                    @if(isset($lapor->status))
                                    @if($lapor->status == 'Sudah')
                                    selected="selected"
                                    @endif
                                    @endif
                                    >Selesai ditangani</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mb-0">
                            <label for="txtFotoBukti" class="col-3 text-right control-label col-form-label">Foto Bukti</label>
                            <div class="col-9 border-left pb-2 pt-2">
                                <input type="file" class="form-control-file" id="txtFotoBukti" name="txtFotoBukti" 
                                @if(isset($lapor->foto_bukti))
                                @else
                                required
                                @endif>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-0 text-right">
                            <button type="reset" class="btn btn-dark waves-effect waves-light">Batal</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')


@endpush
