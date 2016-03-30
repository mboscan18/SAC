@extends('layouts.principal')
@section('page-title','Supervisor')

@section('titulo')  
    <h3 class="page-header"><i class="fa fa-eye"></i></i>Supervisor</h3>
@endsection
@section('lugar')
   <li><i class="fa fa-eye"></i> Supervisor</li>
@endsection
@section('accion')
@endsection

@section('content')
    @include('alerts.errors')
    @include('alerts.messages')
@endsection
