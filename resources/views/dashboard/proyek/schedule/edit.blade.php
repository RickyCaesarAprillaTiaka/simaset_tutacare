@extends('layouts.app')

@section('content-header', 'Ganti Schedule Proyek')

@section('styles')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{!! asset('template/plugins/datepicker/datepicker3.css') !!}">
@endsection

@section('scripts')
<script src="{!! asset('template/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //menu active
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('#datepicker1').datepicker({
            autoclose: true
        });
    });
</script>
<script type="text/javascript" src="/mytuta/js/add.status.js"></script>
@endsection

@section('breadcump')
<li>Dashboard</li>
<li>Proyek</li>
<li>{{$proyek->nama_proyek}}</li>
<li>Schedule Proyek</li>
<li class="active">Ganti Schedule</li>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ganti Schedule</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            {!! Form::open(array('route' => ['dashboard.proyek.schedule.update', 'id_proyek' => $proyek->id, 'id_schedule' => $schedule_proyek->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
            <div class="col-xs-6">
                {!! Form::label('tanggal_mulai', 'Tanggal Mulai') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_mulai" value="{{date('m/d/Y', strtotime($schedule_proyek->tanggal_mulai))}}" required />
                </div>
                {!! Form::label('tanggal_selesai', 'Tanggal Selesai') !!}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker1" name="tanggal_selesai" value="{{date('m/d/Y', strtotime($schedule_proyek->tanggal_selesai))}}"
                        required />
                </div>
                {{ Form::label('Schedule', 'Schedule') }}
                {{ Form::textarea('schedule', $schedule_proyek->schedule, ['class' => 'form-control', 'style' => 'resize: none; margin-bottom:10px;', 'required' => 'required'], 'Schedule') }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group pull-right">
                    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                    <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/proyek/'.$proyek->id.'/schedule') }}">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <!-- /.box -->
    @include('dashboard.asset.modal._status')
    @endsection