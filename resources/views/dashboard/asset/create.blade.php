@extends('layouts.app')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{!! asset('template/plugins/datepicker/datepicker3.css') !!}">
@endsection

@section('scripts')
<!-- bootstrap datepicker -->
<script src="{!! asset('template/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script>
$(document).ready(function() {
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
  });
  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  });
  $('#datepicker1').datepicker({
    autoclose: true
  });

});
</script>
<script type="text/javascript" src="/mytuta/js/add.jenis.js"></script>
<script type="text/javascript" src="/mytuta/js/add.cabang.js"></script>
<script type="text/javascript" src="/mytuta/js/add.status.js"></script>
@endsection

@section('content-header', 'Asset Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Asset</li>
<li class="active">Menambah Asset Baru</li>
@endsection

@section('content')
<div id="code"></div>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Asset Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::open(array('route' => 'dashboard.asset.store', 'method' => 'POST')) !!}
      <div class="col-xs-6">
          {{ Form::tutaText('hardware_type', old('hardware_type'), '*', ['required' => 'required']) }}
          <div class="form-group required {{ $errors->has('jenis_id') ? ' has-error' : '' }}">
              {!! Form::label('jenis_id', 'Jenis') !!} <strong class="text-danger"> *</strong>
              <div class="input-group">
              {!! Form::select('jenis_id', $jenis, old('jenis_id'), array('class' => 'form-control', 'required' => 'required', 'id' => 'select-jenis')) !!}
              <span class="input-group-btn">
                      <button id="add-jenis" type="button" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
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
              <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pembelian" required />
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
              <input type="text" class="form-control pull-right" id="datepicker1" name="jangka_waktu" required />
            </div>
            <!-- /.input group -->
          </div>
          {{ Form::tutaAddon('harga', old('harga'), 'Rp.', '*', ['required' => 'required', 'id' => 'harga', 'autocomplete' => 'off', 'placeholder' => "Harga, masukan hanya angka saja"]) }}
          <div class="form-group required {{ $errors->has('cabang_id') ? ' has-error' : '' }}">
              {!! Form::label('cabang_id', 'Cabang') !!} <strong class="text-danger"> *</strong>
              <div class="input-group">
              {!! Form::select('cabang_id', $cabang, old('cabang_id'), array('class' => 'form-control', 'required' => 'required', 'id' => 'select-cabang')) !!}
              <span class="input-group-btn">
                      <button id="add-cabang" type="button" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
              @if ($errors->has('cabang_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cabang_id') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group required {{ $errors->has('status_id') ? ' has-error' : '' }}">
              {!! Form::label('status_id', 'Status') !!} <strong class="text-danger"> *</strong>
              <div class="input-group">
              {!! Form::select('status_id', $status, old('status_id'), array('class' => 'form-control', 'required' => 'required', 'id' => 'select-status')) !!}
              <span class="input-group-btn">
                      <button id="add-status" type="button" class="btn btn-info btn-flat"><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
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
@include('dashboard.asset.modal._jenis')
@include('dashboard.asset.modal._cabang')
@include('dashboard.asset.modal._status')
<!-- /.box -->
@endsection
