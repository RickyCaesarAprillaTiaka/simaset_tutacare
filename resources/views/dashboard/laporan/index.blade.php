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
    $(".sidebarbody").toggleClass("sidebar-collapse");
});
</script>
@endsection

@section('content-header', 'Laporan Asset')

@section('breadcump')
<li>Dashboard</li>
<li class="active">Laporan Asset</li>
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
		<a href="/dashboard/laporan/pdf" target="_blank" class="btn btn-primary btn-sm" id="btn-add"><i class="fa fa-plus"></i> Download PDF</a>
		</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="cdata" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>NO#</th>
					<th>Hardware Type</th>
          <th>Serial Number</th>
          <th>Jenis</th>
          <th>Tgl. Pembelian</th>
          <th>Harga</th>
          <th>Jangka Waktu</th>
					<th>Cabang</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($asset as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value->hardware_type }}</td>
          <!-- masukan rumus penyusutan dibawah ini -->
          <td>{{ $value->serial_number }}</td>
          <td>{{ $value->jenis->name }}</td>
          <td>{{ date('d-m-Y', strtotime($value->tanggal_pembelian)) }}</td>
          <td>{{number_format($value->harga, 0, ',', '.')}}</td>
          <td>{{ date('d-m-Y', strtotime($value->jangka_waktu)) }}</td>
          <td>{{ $value->cabang->name}}</td>
          <td>{{ $value->status->name}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
