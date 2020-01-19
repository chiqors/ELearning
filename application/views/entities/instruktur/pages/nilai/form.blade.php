@extends('entities.instruktur.layouts.panel')

@section('hstyles')

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ @$info ? 'Ubah' : 'Tambah' }} Nilai <small></small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ site_url('instruktur/kursus') }}">Kursus</a></li>
                    <li class="breadcrumb-item active">{{ @$info ? 'Ubah' : 'Tambah' }} Nilai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form role="form" action="{{ @$info ? site_url('instruktur/nilai/update/'.@$info->id) : site_url('instruktur/nilai/store') }}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-{{ @$info ? 'warning' : 'primary' }}">
                        <div class="card-header">
                            <h3 class="card-title">Materi</h3>
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
										<label for="id_materi">Materi</label>
										<select class="form-control" name="id_materi">
											@if(@$info_materi)
											@foreach ($info_materi as $info_data)
											<option value="{{ @$info_data->id }}" {{ (@$info_data->id==@$info->id_materi) ? 'selected' : '' }}>{{ @$info_data->username }} - ({{ @$info_data->nama_lengkap }})</option>
											@endforeach
											@else
											<option value="">-- MATERI TIDAK TERSEDIA --</option>
											@endif
										</select>
									</div>
									<div class="form-group">
										<label for="id_materi">Pelajar</label>
										<select class="form-control" name="id_materi">
											@if(@$info_pelajar)
											@foreach ($info_pelajar as $info_data)
											<option value="{{ @$info_data->id }}" {{ (@$info_data->id==@$info->id_pelajar) ? 'selected' : '' }}>{{ @$info_data->username }} - ({{ @$info_data->nama_lengkap }})</option>
											@endforeach
											@else
											<option value="">-- PELAJAR TIDAK TERSEDIA --</option>
											@endif
										</select>
									</div>
									<div class="form-group">
										<label for="nilai_akhir">Nilai Akhir</label>
										<input type="text" class="form-control" name="nilai_akhir" value="{{ @$info->nilai_akhir }}">
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

