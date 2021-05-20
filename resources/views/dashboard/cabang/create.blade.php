@extends('layouts.app')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
    $('#menu-master').addClass("active");
    $('#menu-cabang').addClass("active");
});
</script>
@endsection

@section('content-header', 'Cabang Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Cabang</li>
<li class="active">Membuat Cabang Baru</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Cabang Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::open(array('route' => 'dashboard.cabang.store', 'method' => 'POST')) !!}
      <div class="col-xs-12">
        {{ Form::tutaText('cabang', old('cabang'), '*', ['required' => 'required']) }}
      </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/cabang') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection
