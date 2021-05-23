@extends('layouts.app')

@section('content-header', 'Tambah Material Proyek')

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
<li class="active">Tambah Material</li>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Material</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            {!! Form::open(array('route' => ['dashboard.proyek.material.store', 'id_proyek' => $proyek->id], 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
            <table class="container" style="width:50vw;" border="2px">
            @foreach ($material as $key => $value)
            <tr>
                <td width="60%" style="padding: 5px;">
                    {{Form::checkbox('material[]', $value->id, null, ['onclick' => 'if (document.getElementById("material'.$key.'").disabled == true) {document.getElementById("material'.$key.'").disabled = false;} else {document.getElementById("material'.$key.'").disabled = true;}'])}}
                    {{Form::label('material', $value->nama_material)}}
                </td>
                <td align="center" width="10%">
                    {!! Form::input('number', 'jumlah_material[]', null, ['id'=>'material'.$key, 'disabled' => 'true']) !!}
                </td>
            </tr>
                @endforeach  
            </table>
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