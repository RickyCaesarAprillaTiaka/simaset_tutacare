@extends('layouts.app')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
    $('#menu-master').addClass("active");
    $('#menu-material').addClass("active");
});
</script>
@endsection

@section('content-header', 'Ganti Material')

@section('breadcump')
<li>Dashboard</li>
<li>Material</li>
<li class="active">Mengganti Material</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ganti Material</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
			{!! Form::model($material, array('route' => array('dashboard.material.update', $material->id), 'method' => 'PUT')) !!}
      <div class="col-xs-12">
        {{ Form::tutaText('nama_material', $material->material, '*', ['required' => 'required']) }}
      </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/material') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection
