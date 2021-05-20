@extends('layouts.app')

@section('styles')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{!! asset('template/plugins/datepicker/datepicker3.css') !!}">
@endsection

@section('scripts')
<!-- bootstrap datepicker -->
<script src="{!! asset('template/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script>
$(document).ready(function() {
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });
  $('#datepicker1').datepicker({
    autoclose: true
  });
});
</script>
@endsection

@section('content-header', 'Rubah Asset')

@section('breadcump')
<li>Dashboard</li>
<li>Asset</li>
<li class="active">Merubah Asset Baru</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Rubah Asset</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::model($asset, array('route' => array('dashboard.asset.update', $asset->id), 'method' => 'PUT')) !!}
      <div class="col-xs-6">
          {{ Form::tutaText('hardware_type', old('hardware_type'), '*', ['required' => 'required']) }}
          <div class="form-group required {{ $errors->has('jenis_id') ? ' has-error' : '' }}">
              {!! Form::label('jenis_id', 'Jenis') !!} <strong class="text-danger"> *</strong>
              {!! Form::select('jenis_id', $jenis, old('jenis_id'), array('class' => 'form-control', 'required' => 'required')) !!}
              @if ($errors->has('jenis_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('jenis_id') }}</strong>
                  </span>
              @endif
          </div>
          {{ Form::tutaText('serial_number', old('serial_number'), '*', ['required' => 'required']) }}
          <div class="form-group">
            {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian') !!}
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker" value="{{date('d-m-Y', strtotime($asset->tanggal_pembelian))}}" name="tanggal_pembelian" required />
            </div>
            <!-- /.input group -->
          </div>
</div>
<div class="col-xs-6">
          <div class="form-group">
            {!! Form::label('jangka_waktu', 'Jangka Waktu') !!}
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker1" value="{{date('d-m-Y', strtotime($asset->jangka_waktu))}}" name="jangka_waktu" required />
            </div>
            <!-- /.input group -->
          </div>
          {{ Form::tutaText('harga', old('harga'), '*', ['required' => 'required']) }}
          <div class="form-group required {{ $errors->has('cabang_id') ? ' has-error' : '' }}">
              {!! Form::label('cabang_id', 'Cabang') !!} <strong class="text-danger"> *</strong>
              {!! Form::select('cabang_id', $cabang, old('cabang_id'), array('class' => 'form-control', 'required' => 'required')) !!}
              @if ($errors->has('cabang_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cabang_id') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group required {{ $errors->has('status_id') ? ' has-error' : '' }}">
              {!! Form::label('status_id', 'status') !!} <strong class="text-danger"> *</strong>
              {!! Form::select('status_id', $status, old('status_id'), array('class' => 'form-control', 'required' => 'required')) !!}
              @if ($errors->has('status_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('status_id') }}</strong>
                  </span>
              @endif
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/asset') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection
