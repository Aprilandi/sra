@extends('templates.default')
@push('style')
 {{-- aditional style --}}
@endpush

@section('content')

    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0">Master Santri</h5>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Data Kamar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   
    <div class="page-content container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="material-card card">
                            <div class="card-body">
                                <h4 class="card-title">Data Kamar</h4>
                                {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>Nomor Kamar</th>
                                                <th>Nama Kamar</th>
                                                <th>Kapasitas Kamar</th>
                                                <th>Sisa Kamar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @foreach($kamar as $row)
                                                    
                                                    
                                                        <tr>
                                                            <td>{{$row->no_kamar}}</td>
                                                            <td>{{$row->nama_kamar}}</td>
                                                            <td>{{$row->kapasitas_kamar}}</td>
                                                            <td>{{ $row->kapasitas_kamar-$row->KamarSantri()->count()   }}</td>
                                                            <td>
                                                                <a href="#"><button class="btn btn-primary">Edit</button></a>
                                                                <a href="#"><button class="btn btn-danger">Hapus</button></a>
                                                            </td>
                                                        </tr>
                                                    
                                               @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

@endsection

@push('scripts')


 {{-- aditional JS --}}

@endpush