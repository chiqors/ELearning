@extends('entities.instruktur.layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tampil Materi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('instruktur/kursus') }}">Kursus</a></li>
                    <li class="breadcrumb-item active">Tampil Materi</li>
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
					<h3 class="card-title"><b>Tampil Materi</b></h3>
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
										<td>Judul</td>
										<td>{{ $info->judul }}</td>
									</tr>
									<tr>
										<td>Deskripsi</td>
										<td>{{ $info->konten }}</td>
									</tr>
									<tr>
										<td>Konten</td>
										<td>{!! $info->konten !!}}</td>
									</tr>
									<tr>
										<td>Video</td>
										<td>{!! $info->video !!}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<a href="{{ site_url('instruktur/materi/edit/'.$info->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a>
						<a href="{{ site_url('instruktur/materi/destroy/'.$info->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
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
