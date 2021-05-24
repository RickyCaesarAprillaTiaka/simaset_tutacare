@extends('layouts.app')

@section('content-header', 'Tambah Progress Proyek')

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        //menu active
    });
</script>
<script type="text/javascript" src="/mytuta/js/add.status.js"></script>
@endsection

@section('breadcump')
<li>Dashboard</li>
<li>Proyek</li>
<li>{{$proyek->nama_proyek}}</li>
<li>Progress Proyek</li>
<li class="active">Mengganti Progress</li>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ganti Progress</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-6">
                {!! Form::open(array('route' => ['dashboard.proyek.progress.update', 'id_proyek' => $proyek->id, 'id_progress' => $progress_proyek->id],
                'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
                {{ Form::tutaText('lokasi', $progress_proyek->lokasi, '*', ['required' => 'required'], 'Lokasi') }}
                {{ Form::tutaText('progress', $progress_proyek->progress, '*', ['required' => 'required'], 'Progress') }}
                {{Form::label('status', 'Status Proyek')}}
                <div class="input-group">
                    {!! Form::select('status', $status_proyek, old('status_proyek'), array('class' =>
                    'form-control', 'required' => 'required', 'id' => 'select-status')) !!}
                    <span class="input-group-btn">
                        <button id="add-status" type="button" class="btn btn-info btn-flat"><i
                                class="fa fa-plus"></i></button>
                    </span>
                </div>
                {{ Form::tutaText('persentase', $progress_proyek->persentase, '*', ['required' => 'required'], 'Persentase') }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group pull-right">
                    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                    <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/proyek/'.$proyek->id.'/progress') }}">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <!-- /.box -->
    @include('dashboard.asset.modal._status')
    @endsection