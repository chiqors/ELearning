@extends('entities.petugasadministrasi.layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Kursus <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('petugasadministrasi/kursus') }}">Kursus</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Kursus</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('petugasadministrasi/kursus/update/'.@$info->id) : site_url('petugasadministrasi/kursus/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Kursus</h3>
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
										<label for="NamaKursus">Nama Kursus</label>
										<input type="text" class="form-control" name="nama" value="{{ @$info->nama_lengkap }}">
									</div>
									<div class="form-group">
										<label for="TingkatEdukasi">Tingkat Edukasi</label>
										<input type="text" class="form-control" name="tingkat_edukasi" value="{{ @$info->tingkat_edukasi }}">
									</div>
									<div class="form-group">
                                        <label for="id_instruktur">Instruktur</label>
                                        <select class="form-control" name="id_instruktur">
											@if(@$info_instruktur)
											@foreach ($info_instruktur as $info_data)
											<option value="{{ @$info_data->id }}" {{ (@$info_data->id_instruktur==@$info->id) ? 'selected' : '' }}>{{ @$info_data->username }} - ({{ @$info_data->nama_lengkap }})</option>
											@endforeach
											@else
											<option value="">-- INSTRUKTUR TIDAK TERSEDIA --</option>
											@endif
										</select>
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

