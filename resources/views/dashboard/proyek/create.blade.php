@extends('layouts.app')

@section('content-header', 'Tambah Proyek')

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    //menu active
});
</script>
<script type="text/javascript" src="/mytuta/js/add.status.js"></script>
@endsection

@section('breadcump')
<li>Dashboard</li>
<li>Proyek</li>
<li class="active">Tambah Proyek</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Proyek</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::open(array('route' => 'dashboard.proyek.store', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
      <div class="col-xs-6">
        {{ Form::tutaText('nama_proyek', old('nama_proyek'), '*', ['required' => 'required'], 'Nama Proyek') }}
        {{ Form::tutaText('pemegang_proyek', old('pemegang_proyek'), '*', ['required' => 'required'], 'Pemegang Proyek') }}
        {{ Form::label('lokasi_proyek', 'Lokasi Proyek') }}
        {{ Form::textarea('lokasi_proyek', old('lokasi_proyek'), ['class' => 'form-control', 'style' => 'resize: none; margin-bottom:10px;', 'required' => 'required'], 'Lokasi Proyek') }}
      </div>
      <div class="col-xs-6">
        {{ Form::tutaText('owner_proyek', old('owner_proyek'), '*', ['required' => 'required'], 'Owner Proyek') }}
        <div class="form-group required {{ $errors->has('status_id') ? ' has-error' : '' }}">
            {!! Form::label('status_proyek', 'Status') !!} <strong class="text-danger"> *</strong>
            <div class="input-group">
            {!! Form::select('status_proyek', $status_proyek, old('status_proyek'), array('class' => 'form-control', 'required' => 'required', 'id' => 'select-status')) !!}
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
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/proyek') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@include('dashboard.asset.modal._status')
@endsection
