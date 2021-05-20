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
    //menu active
    $('#menu-master').addClass("active");
    $('#menu-cabang').addClass("active");
});
</script>
@endsection

@section('content-header', 'Cabang')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Cabang</li>
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
		<a href="/dashboard/cabang/create" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Buat Cabang Baru</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>Cabang</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cabang as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->name }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.cabang.destroy', $value->id], 'method' => 'delete']) !!}
			            <a href="{!! route('dashboard.cabang.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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
