@extends('layouts.principal')
  @section('page-title', 'Contactos Bancarios')

@section('titulo')  
    <h3 class="page-header"><i class="fa fa-credit-card"></i> Contactos Bancarios</h3>
@endsection
@section('lugar')
   <li><i class="fa fa-credit-card"></i> Contactos Bancarios</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')


          <div class="col-lg-1 col-md-1 col-sm-1"><br></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">
                	Contactos Bancarios
                </div>
                <div class="panel-body" >
		              <div class="empresas">
		              	<div class="col-lg-12 col-md-12 col-sm-12"><br></div>
                      <div class="col-lg-9 col-md-9 col-sm-9">
                          <h4 class="">Contactos Bancarios</h4>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px">
                          <a  href="{!!URL::to('/DatosBancarios/create')!!}">
	                      	<div class="boton tam-13" style="width: 100%; heigth: 80%; text-align: center">
	                            Agregar Contacto Bancario
	                      	</div>
                          </a>
                      </div> 
                      <div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"><br></div>
						<div class="datoBancario">
							<table class="table">
					      		<thead>
					      			<th>Empresa Asociada</th>
							        <th>Nro Cuenta</th>
							        <th>Nombre Titular</th>
							        <th>Identif. Titular</th>
							        <th>Nombre Banco</th>
							        <th>Telefono</th>
							        <th>Email</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
						        		<th>Ultima Modificacion</th>
						        	@endif	
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente') || (Auth::user()->rol_Usuario == 'contador'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						      @foreach($datos as $datosB)
						        <tbody>
						          <td>{{$datosB->empresa->nombre_Empresa}}</td>
						          <td>{{$datosB->nroCuentaBancario}}</td>
						          <td>{{$datosB->nombreContacto}}</td>
						          <td>{{$datosB->identificacionTitular}}</td>
						          <td>{{$datosB->banco->nombreBanco}}</td>
						          <td>{{$datosB->telefono}}</td>
						          <td>{{$datosB->email}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datosB->user->nombre_Usuario}} {{$datosB->user->apellido_Usuario}} | {{$datosB->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif   
					            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente') || (Auth::user()->rol_Usuario == 'contador'))
								          <td  style="text-align: center">
											<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
												<a href="{!!URL::to('/DatosBancarios/'.$datosB->id.'/edit')!!}" class="" style="text-align: center;">
						                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
						                    	</a>
						                    </div>
										  </td>
								  	@endif
						        </tbody>
						      @endforeach
						    </table>
						</div>
					</div>
                </div>
            </div>
          </div>
            <!-- page start-->
              
            <!-- page end-->
	@endsection
	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection