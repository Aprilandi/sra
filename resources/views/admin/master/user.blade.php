@extends('templates.default')
@push('style')
{{-- aditional style --}}
@endpush

@section('content')

<div class="page-breadcrumb border-bottom">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">Pengelolaan Akun</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0">
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Data Akun</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content container-fluid">
    <!-- Modal -->
    <div id="tambahAkun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambahAkunLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAkunLabel"><b>Tambah Data Jenis Dokumen</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="txtRole">Role</label>
                            <select class="form-control" id="txtRole" name="txtRole" required>
                                    <option value="" selected disabled hidden>Pilih Role</option>
                                    @foreach($role as $rr)
                                    <option value="{{ $rr->id_role }}">{{ $rr->role }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="txtUsername">Username</label><br>
                            <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password</label><br>
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Masukkan Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="editAkun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editAkunLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAkunLabel"><b>Edit Data Akun</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="txtedRole">Role</label>
                            <select class="form-control" id="txtedRole" name="txtedRole" required>
                                    <option value="" selected disabled hidden>Pilih Role</option>
                                    @foreach($role as $rr)
                                    <option value="{{ $rr->id_role }}">{{ $rr->role }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="txtedUsername">Username</label><br>
                            <input type="text" class="form-control" id="txtedUsername" name="txtedUsername" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="txtedPassword">Password</label><br>
                            <input type="password" class="form-control" id="txtedPassword" name="txtedPassword" placeholder="Masukkan Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <div class="row">
        <div class="col-12">
            <div class="material-card card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="card-title">Data Jenis Dokumen </h4>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAkun">
                                + Tambah
                            </button>
                        </div>
                        {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function:<code> $().DataTable();</code>. You can refer full documentation from here <a href="https://datatables.net/">Datatables</a></h6> --}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Role</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        ?>
                                        @foreach($user as $row)
                                        <tr>
                                            <td>{{ $number }}</td>
                                            <td>{{ $row->role->role }}</td>
                                            <td>{{ $row->username }}</td>
                                            <td>{{ $row->password }}</td>
                                            <td>
                                                <button class="btn btn-primary" id="edit" href="{{ route('user.update', $row->id_user) }}" data-role="{{ $row->id_role }}" data-user="{{ $row->username }}"  data-pass="{{ $row->password }}">Edit</button>
                                                <button class="btn btn-danger" id="delete" href="{{ route('user.destroy', $row->id_user) }}" data-user="{{ $row->username }}">Hapus</button>
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
    </div>
</div>
<form action="" method="post" id="deleteForm">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endsection

@push('scripts')

{{-- aditional JS --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('templates.partials._sweetalert')

<script>
    $('button#delete').on('click', function() {
        var href = $(this).attr('href');
        var name = $(this).data('user');
        Swal.fire({
                title: "Anda yakin untuk menghapus username \"" + name + "\"?",
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

    $('button#edit').on('click', function() {
        var role = $(this).data("role");
        var user = $(this).data("user");
        var pass = $(this).data("pass");
        var href = $(this).attr('href');
        $('#txtedRole').val(role);
        $('#txtedUsername').val(user);
        $('#txtedPassword').val(pass);
        $('#updateForm').attr('action', href);
        $("#editAkun").modal('show');
    });
</script>

@endpush