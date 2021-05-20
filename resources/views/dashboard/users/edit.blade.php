@extends('layouts.app')

@section('content-header', 'Ganti Pengguna')

@section('breadcump')
<li>Dashboard</li>
<li>Pengguna</li>
<li class="active">Mengganti Pengguna</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Mengganti Pengguna</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
			{!! Form::model($users, array('route' => array('dashboard.users.update', $users->id), 'method' => 'PUT')) !!}
      {!! Form::hidden('id', $users->id) !!}
      <div class="col-xs-12">
        {{ Form::tutaText('name', old('name'), '*', ['required' => 'required'], 'Nama') }}
        {{ Form::tutaEmail('email', old('email'), '*', ['required' => 'required']) }}
        {{ Form::tutaPass('password', null, [], null, '<em class="text-success">Kosongkan jika tidak ingin mengganti password</em>') }}
        <div class="form-group required {{ $errors->has('role') ? ' has-error' : '' }}">
        {{ Form::label('role', 'Role') }}
        {{ Form::select('role', ['admin' => 'Administrator', 'operator' => 'Operator'], null, ['class' => 'form-control', 'required' => 'required']) }}
        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group">
            <label class="control-label">Foto</label>
            <p><img src="/user/img/{{$users->foto}}" class="user-image" alt="User Image"></p>
            {!! Form::file('foto', old('foto'), array('class' => 'form-control')) !!}
        </div>

      </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/users') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection
