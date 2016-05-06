@extends('layouts.principal')
@section('page-title', 'Bancos')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Bancos</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/Bancos')!!}">Bancos</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-pencil"></i>Editar Banco</li>
@endsection

	@section('content')
              @include('alerts.request')
      @include('alerts.errors')

            <!-- page start-->
            <div class="col-lg-1"></div>
              <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb">
                      <div class="col-lg-9 col-md-9 col-sm-12">
                            Editar Banco 
                        </div>
                        <a href="{!!URL::to('/Bancos')!!}" >
                          <div class="col-lg-3 col-md-3 col-sm-12 fa fa-arrow-left " style="text-align: right; padding-top: 10px;">
                              <span class="font">
                                Volver a Bancos
                              </span>
                          </div>
                        </a> 
                    </div>
                    <div class="panel-body" >
                      {!!Form::model($banco,['route'=>['Bancos.update',$banco],'method'=>'PUT','files' => true])!!}
                          @include('Bancos.form.bancos')
                          
                          <div class="row">
                            
                            @if($banco->logo == null)
                                <div class="col-lg-6" style="text-align: right">
                                    {!!Form::label('foto','Logo del Banco (Opcional):')!!}
                                </div>
                                <div class="col-lg-6 icon-reorder tooltips" data-original-title="Editar Logo" data-placement="top">
                                    {!!Form::file('logo',['accept' => 'image/*'])!!}
                                </div>
                            @else
                                <div class="col-lg-12" style="text-align: center">
                                    <img src="{!!URL::asset('archivos/'.$banco->logo)!!}" alt="" style="height:100px;"/>
                                    
                                    <br><br>
                                    <div class="col-lg-6" style="text-align: right">
                                      {!!Form::label('foto','Logo del Banco:')!!}
                                    </div>
                                    <a href="{!!URL::to('/deleteFileBanco/'.$banco->id)!!}" class="icon-reorder tooltips col-lg-1" data-original-title="Eliminar Logo" data-placement="top" style=" text-align: center">
                                        <img src="{!!URL::asset('img/icon_delete.png')!!}" alt="" style="width:25px; "/>
                                    </a>
                                    <div class="col-lg-5 icon-reorder tooltips" data-original-title="Editar Logo" data-placement="top">
                                      {!!Form::file('logo',['accept' => 'image/*'])!!}
                                    </div>
                                </div>  
                            @endif  
                            
                          
                          </div>
                                <br><br>
                             <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                              <button type="submit" class="boton" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                            </div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left">

                          {!!Form::open(['route'=>['Bancos.destroy', $banco], 'method' => 'DELETE'])!!}
                            <button type="submit" class="boton boton-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
                            {!!Form::close()!!}
                      </div>
                    </div>
                </div>
              </div>
              
            <!-- page end-->
	
		
	@endsection