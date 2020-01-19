@extends('entities.pelajar.layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tampil Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelajar/profil') }}">Profil</a></li>
                    <li class="breadcrumb-item active">Tampil Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>Tampil Profil</b></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>ID Pengguna</td>
										<td>{{ $info->id_pengguna }}</td>
									</tr>
									<tr>
										<td>Username</td>
										<td>{{ $info->username }}</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>{{ $info->status }}</td>
									</tr>
									<tr>
										<td>Nama Lengkap</td>
										<td>{{ $info->nama_lengkap }}</td>
									</tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>{{ $info->jenis_kelamin }}</td>
									</tr>
									<tr>
										<td>Tempat Tanggal Lahir</td>
										<td>{{ $info->alamat }}</td>
									</tr>
									<tr>
										<td>Kontak</td>
										<td>{{ $info->kontak }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<a href="{{ site_url('pelajar/profil/edit') }}" class="btn btn-primary"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')

@endsection
