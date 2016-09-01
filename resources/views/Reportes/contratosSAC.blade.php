@extends('layouts.principal')
  @section('page-title', 'Contratos del Sistema')
 
@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_project_big.png')!!}" style="width: 35px"> Contratos del Sistema</h3>
@endsection
@section('lugar')
   <li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px">Contratos del Sistema</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-primary">
            <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb;">
                       Contratos del Sistema
                  </div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table" id="tabla_Proyectos" style="overflow-x: scroll;">
					      		<thead>
					      			<th>Cod. Proyecto</th>
					      			<th>Cod. Contrato</th>
							        <th>Proveedor</th>
					      			<th>Administrador</th>
					      			<th>Operaciones</th>
						      	</thead>
						        <tbody>
						      @foreach($contratosSac as $datos)
							      <tr>
							          <td>{{$datos->cod_Proyecto}}</td>
							          <td>{{$datos->cod_Contrato}}</td>
							          <td>{{$datos->nombre_Proveedor}}</td>
							          <td>{{$datos->usuario}}</td>
				          			  <td class=" col-lg-1" style="text-align: center">
											<div  style="; text-align: center">
												<a class="btn btn-primary" href="{!!URL::to('/OpcionesContrato/'.$datos->id_Contrato)!!}" class="" style="text-align: center;">
						                        	Ir a Contrato
						                    	</a>
						                    </div>
							          </td>
							      </tr>
						      @endforeach
						        </tbody>
						    </table>
						</div>
                </div>
            </div>
          </div>
            <!-- page start-->
              
            <!-- page end-->
	@endsection
	@section('scripts')
	@endsection