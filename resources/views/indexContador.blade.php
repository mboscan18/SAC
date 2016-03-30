@extends('layouts.principal')
@section('page-title','Administrador de Finanzas')

@section('titulo')  
    <h3 class="page-header"><i class="icon_calulator"></i></i>Administrador de Finanzas</h3>
@endsection
@section('lugar')
   <li><i class="icon_calulator"></i> Administrador de Finanzas</li>
@endsection
@section('accion')
@endsection

@section('content')              
    @include('alerts.errors')
    @include('alerts.messages')
@endsection
