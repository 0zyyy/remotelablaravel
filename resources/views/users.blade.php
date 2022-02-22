@extends('layouts.dash')

@section('container')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Daftar Pengguna</h5>
                                <table class="table datatable" id="users">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NRP</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->nrp }}</td>
                                                <td>{{ $user->hak }}</td>
                                                <form method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $user->id }}" name="id">
                                                    <td><input type="submit" class="btn btn-danger" name="hapus" id="hapus"
                                                            value="Hapus Akun"></td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <script>
                                        $(document).ready(function() {
                                            $('#users').dataTable({
                                                "oLanguage": {
                                                    "sSearch": "Cari:",
                                                    "sZeroRecords": "Tidak ada data pencarian",
                                                    "sLengthMenu": "Menampilkan _MENU_ data",
                                                    "sInfo": "Total ada _TOTAL_ data untuk ditampilkan (_START_ sampai _END_)",
                                                    "sNext": "Berikutnya",
                                                    "sPrevious": "Sebelumnya",
                                                }
                                            });
                                            $("#hapus").click(function() {
                                                alert(var_dump($_POST));
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
