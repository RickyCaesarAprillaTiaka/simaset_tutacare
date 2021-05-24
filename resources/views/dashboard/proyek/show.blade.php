@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{!! asset('template/plugins/datatables/dataTables.bootstrap.css') !!}">
@endsection

@section('scripts')

@endsection

@section('content-header', $proyek->nama_proyek)

@section('breadcump')
<li>Dashboard</li>
<li>Proyek</li>
<li class="active">{{$proyek->nama_proyek}}</li>
@endsection

@section('content')
@if (Session::has('message'))
<div class="row">
    <div class="col-md-12">
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
        </div>
    </div>
</div>
@endif
<div class="box">
    <div class="box-body">
        <div class="container mx-auto" style="width:20vw;">
            <a href="{{route('dashboard.proyek.material.index', ['id_proyek' => $proyek->id])}}" class="btn btn-success" style="width: 100%; margin-bottom: 10px;">Material <small class="label bg-yellow">{{Asset::materialProyekCount($proyek->id)}}</small></a>
            <a href="{{route('dashboard.proyek.schedule.index', ['id_proyek' => $proyek->id])}}" class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">Schedule <small class="label bg-yellow">{{Asset::scheduleProyekCount($proyek->id)}}</small></a>
            <a href="{{route('dashboard.proyek.progress.index', ['id_proyek' => $proyek->id])}}" class="btn btn-danger" style="width: 100%;">Progress <small class="label bg-yellow">{{Asset::progressProyekCount($proyek->id)}}</small></a>
        </div>
    </div>
</div>
@endsection