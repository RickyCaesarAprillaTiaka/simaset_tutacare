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

@section('content-header', 'Asset')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Asset</li>
@endsection

@section('content')
@if (Session::has('message'))
<div class="row">
<div class="col-md-12">
  <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('message') }}
  </div>
</div>
</div>
@endif
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
		<a href="/dashboard/asset/create" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Tambah Asset Baru</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
		  <th>NO</th>
		  <th>Hardware Type</th>
          <th>Serial Number</th>
          <th>Tgl. Pembelian</th>
          <th>Harga</th>
          <th>Jangka Waktu</th>
		  <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asset as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->hardware_type }}</td>
          <!-- masukan rumus penyusutan dibawah ini -->
          <td>{{ $value->serial_number }}</td>
          <td>{{ date('d-m-Y', strtotime($value->tanggal_pembelian)) }}</td>
          <td>{{number_format($value->harga, 0, ',', '.')}}</td>
          <td>{{ date('d-m-Y', strtotime($value->jangka_waktu)) }}</td>
          <td>
			            {!! Form::open(['route' => ['dashboard.asset.destroy', $value->id], 'method' => 'delete']) !!}
			            <a href="{!! route('dashboard.asset.edit', $value->id) !!}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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
