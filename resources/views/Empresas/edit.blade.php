@extends('layouts.principal')
@section('page-title', 'Empresas - Editar')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Empresas</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/Empresas')!!}">Empresas</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-pencil"></i>Editar Empresa</li>
@endsection

	@section('content')
              @include('alerts.request')
      @include('alerts.errors')

            <!-- page start-->
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos de Empresa</div>
                    <div class="panel-body" >
                      {!!Form::model($empresa,['route'=>['Empresas.update',$empresa],'method'=>'PUT','files' => true])!!}
                          @include('Empresas.form.empresas')
                          
                            
                            @if($empresa->logo == null)
                                <div class="col-lg-6" style="text-align: right">
                                    {!!Form::label('foto','Logo de la Empresa (Opcional):')!!}
                                </div>
                                <div class="col-lg-6 icon-reorder tooltips" data-original-title="Editar Logo" data-placement="top">
                                    {!!Form::file('logo',['accept' => 'image/*'])!!}
                                </div>
                            @else
                                <div class="col-lg-12" style="text-align: center">
                                    <img src="{!!URL::asset('archivos/'.$empresa->logo)!!}" alt="" style="height:100px;"/>
                                    
                                    <br><br>
                                    <div class="col-lg-6" style="text-align: right">
                                      {!!Form::label('foto','Logo de la Empresa:')!!}
                                    </div>
                                    <a href="{!!URL::to('/deleteFileEmpresa/'.$empresa->id)!!}" class="icon-reorder tooltips col-lg-1" data-original-title="Eliminar Logo" data-placement="top" style=" text-align: center">
                                        <img src="{!!URL::asset('img/icon_delete.png')!!}" alt="" style="width:25px; "/>
                                    </a>
                                    <div class="col-lg-5 icon-reorder tooltips" data-original-title="Editar Logo" data-placement="top">
                                      {!!Form::file('logo',['accept' => 'image/*'])!!}
                                    </div>
                                </div>  
                                <br><br>
                            @endif  
                            
                          
                          </div>
                          	 <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                          	</div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left">

                          {!!Form::open(['route'=>['Empresas.destroy', $empresa], 'method' => 'DELETE'])!!}
                						<button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                            {!!Form::close()!!}
            					</div>
                    </div>
                </div>
              </div>
            <!-- page end-->
	
		
	@endsection