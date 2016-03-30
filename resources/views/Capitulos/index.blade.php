@extends('layouts.principal')
  @section('page-title', 'Capitulos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i> Capitulos</h3>
@endsection
@section('lugar')
   <li><i class="icon_documents"></i> Capitulos</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')
	    @include('alerts.errors')
	    <!-- page start-->
	    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Empresa" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Capitulos/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
 			<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a Excel" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_excel.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
            <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a PDF" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_pdf.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
	          <div class="col-lg-8 col-md-8 col-sm-8"> </div>
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Empresas Eliminadas" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('EmpresasDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif      
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Capitulos</div>
                <div class="panel-body" >
		              <div class="capitulos">
						<table class="table" id="table_empresas" class="display">
						      <thead>
						        <th>Descripción</th>
						        @if(Auth::user()->rol_Usuario == 'administrador')
						        	<th>Ultima Modificación</th>
						        @endif		
						        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
						        	<th>Operación</th>
						        @endif	
						      </thead>
						        <tbody>
						      @foreach($capitulos as $datos)
						      <tr>
						          <td>{{$datos->Descripcion}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif    
						          @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td  style="text-align: center">
										<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
											<a href="{!!URL::to('/Capitulos/'.$datos->id.'/edit')!!}" class="" style="text-align: center;">
					                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
					                    	</a>
					                    </div>
									  </td>
								  @endif	
							  </tr>	  
						      @endforeach
					    	</tbody>
					    </table>
					</div>
                </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>

            <!-- page end-->
              
            <!-- page end-->
	@endsection