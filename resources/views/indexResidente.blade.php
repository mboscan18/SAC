@extends('layouts.principal')
@section('page-title','Administrador de Contratos')

@section('titulo') 
    <h3 class="page-header"><i class="icon_building_alt"></i>Administrador de Contratos</h3>
@endsection
@section('lugar')
   <li><i class="icon_building_alt"></i> Administrador de Contratos</li>
@endsection
@section('accion')
@endsection

@section('content')          
    @include('alerts.errors')
    @include('alerts.messages')
@endsection