@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('template/plugins/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#cdata').DataTable();
});
</script>
@endsection

@section('content-header', 'Proyek')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Proyek</li>
@endsection

@section('content')
@if (Session::has('message'))
<div class="row">
<div class="col-md-12">
  <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
</div></div>
@endif
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/proyek/create" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Tambah Proyek</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Proyek</th>
                    <th>Pemegang Proyek</th>
                    <th>Lokasi Proyek</th>
                    <th>Owner Proyek</th>
                    <th>Status Proyek</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($proyek as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->nama_proyek }}</td>
                    <td>{{ $value->pemegang_proyek }}</td>
                    <td>{{ $value->lokasi_proyek }}</td>
                    <td>{{ $value->owner_proyek }}</td>
                    <td>{{ $value->status->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['dashboard.proyek.destroy', $value->id], 'method' => 'delete']) !!}
			            <a href="{!! route('dashboard.proyek.show', $value->id) !!}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-eye-open"></i></a>
						<a href="{!! route('dashboard.proyek.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
						<a href="{{route('dashboard.proyek.pdf', ['id_proyek' => $value->id])}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-download-alt"></i></a>
			            <a onclick="if (!confirm('Benar Ingin Menghapus?')) {return false;};">
			              <button type="submit" class="btn btn-xs btn-danger delete"><i class="glyphicon glyphicon-trash"></i></button>
			            </a>
			            {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
