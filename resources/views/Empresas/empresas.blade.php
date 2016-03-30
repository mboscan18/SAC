<table class="table">
      <thead>
        <th>Logo</th>
        <th>Identificacion</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Agente de Retencion</th>
        <th>Operacion</th>
      </thead>
      @foreach($empresas as $empresa)
        <tbody>
          <td>{{$empresa->logo}}</td>
          <td>{{$empresa->codIdentificacion_Empresa}}</td>
          <td>{{$empresa->nombre_Empresa}}</td>
          <td>{{$empresa->telefono}}</td>
          <td>{{$empresa->agenteRetencion}}</td>
          <td>
            {!!link_to_route('Empresas.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
          </td>
        </tbody>
      @endforeach
    </table>
    {!!$users->render()!!}