@extends('entities.pelajar.layouts.panel')

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
				<h1>Beranda</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Beranda</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-info elevation-1"><i class="fa fa-calendar-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Kursus Diikuti</span>
						<span class="info-box-number">
							Belum ada
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Kursus Tercapai</span>
						<span class="info-box-number">
							@if(@$info_total_kursus_tercapai)
							{{ $info_total_kursus_tercapai }} / {{ $info_total_kursus }}
							@else
							0 / 0
							@endif
						</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<!-- fix for small devices only -->
			<div class="clearfix hidden-md-up"></div>
		</div>
		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Rekomendasi Kursus</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip"
						title="Collapse">
						<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
						<thead>
							<tr>
								<th>Nama Kursus</th>
								<th>Tingkat Edukasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if(@$info_rekomendasi_kursus)
							@foreach ($info_rekomendasi_kursus as $info_data)
							<tr>
								<td>{{ $info_data->nama }}</td>
								<td>{{ $info_data->tingkat_edukasi }}</td>
								<td>
									<a href="{{ site_url('pelajar/join/'.$info_data->id_kursus) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Gabung</a>
									@if(!$info_pembayaran_kursus)
									<a href="{{ site_url('pelajar/pembayaran') }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Bayar</a>
									@endif
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->
	</div>
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
		"bFilter": false
	});
});
</script>
@endsection
