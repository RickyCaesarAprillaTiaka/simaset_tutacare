@extends('layouts.app')

@section('content-header', 'Ganti Material Proyek')

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
<li>Material Proyek</li>
<li class="active">Ganti Material</li>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ganti Material</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            {!! Form::open(array('route' => ['dashboard.proyek.material.update', 'id_proyek' => $proyek->id, 'id_material' => $material_proyek->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
            <div class="col-xs-12">
                {{ Form::tutaText('jumlah', $material_proyek->jumlah, '*', ['required' => 'required'], 'Jumlah Material '.$material_proyek->material->nama_material) }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group pull-right">
                    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                    <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/proyek/'.$proyek->id.'/material') }}">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <!-- /.box -->
    @include('dashboard.asset.modal._status')
    @endsection