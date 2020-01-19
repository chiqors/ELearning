@extends('entities.pelajar.layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Profil <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('pelajar/profile') }}">Profil</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('pelajar/profile/update') : site_url('pelajar/profile/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Profil</h3>
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
								<div class="col-6">
									<div class="form-group">
										<label for="Nama Lengkap">Nama Lengkap</label>
										<input type="text" class="form-control" name="nama_lengkap" value="{{ @$info->nama_lengkap }}">
									</div>
									<div class="form-group">
										<label for="Jenis Kelamin">Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin">
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="Tempat Tanggal Lahir">Tempat Tanggal Lahir</label>
										<input type="text" class="form-control" name="tempat_tanggal_lahir" value="{{ @$info->tempat_tanggal_lahir }}">
									</div>
									<div class="form-group">
										<label for="alamat">Alamat</label>
										<textarea class="form-control" name="alamat">{{ @$info->alamat }}</textarea>
									</div>
									<div class="form-group">
										<label for="No HP">Kontak (No HP)</label>
										<input type="text" class="form-control" name="kontak" value="{{ @$info->kontak }}">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="Username">Username</label>
										<input type="text" class="form-control" name="username" value="{{ @$info->username }}" readonly>
									</div>
									<div class="form-group">
										<label for="Password">Current Password</label>
										<input type="password" class="form-control" name="password">
									</div>
									<div class="form-group">
										<label for="NewPassword">New Password</label>
										<input type="password" class="form-control" name="new_password">
									</div>
									<div class="form-group">
										<label for="Password">Confirm Password</label>
										<input type="password" class="form-control" name="confirm_password">
									</div>
								</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-{{ @$info ? 'warning' : 'primary' }}">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection

@section('fscripts')
    <script type="text/javascript">
        $(function () {
            $('#tanggalpengisian').datetimepicker({
                format : 'YYYY-MM-DD hh:mm:ss',
                ignoreReadonly: true
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cpanel/vendor/bootstrap-datetimepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- CK Editor -->
    <script type="text/javascript" src="{{ asset('cpanel/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            ClassicEditor
            .create(document.querySelector('#body-editor'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
        })
    </script>
@endsection

