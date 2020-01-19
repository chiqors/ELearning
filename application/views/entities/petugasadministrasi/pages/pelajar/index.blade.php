@extends('entities.petugasadministrasi.layouts.panel')

@section('hstyles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pelajar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Pelajar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pelajar</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Username</th>
									<th>Nama Lengkap</th>
									<th>Kontak</th>
									<th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								@php
								$i = 1;
								@endphp
								@foreach ($info as $info_data)	
                                <tr>
                                    <td>{{ $info_data->username }}</td>
                                    <td>{{ $info_data->nama_lengkap }}</td>
                                    <td>{{ $info_data->kontak }}</td>
									<td>
										<a href="{{ site_url('petugasadministrasi/pelajar/show/'.$info_data->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat</a>
										<a href="{{ site_url('petugasadministrasi/pelajar/edit/'.$info_data->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a>
										<a href="{{ site_url('petugasadministrasi/pelajar/destroy/'.$info_data->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
                                    </td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
		<!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('fscripts')
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
$(document).ready(function() {
    var table = $('#table-data').DataTable({
		"bFilter": false,
		"lengthChange": false
	});
});
</script>
@endsection
