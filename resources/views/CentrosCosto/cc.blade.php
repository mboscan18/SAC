<table class="table">
      <thead>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Operacion</th>
      </thead>
      @foreach($cc as $centros)
        <tbody>
          <td>{{$centros->cod_CC}}</td>
          <td>{{$centros->descripcion_CC}}</td>
          <td>
            {!!link_to_route('CentrosCosto.edit', $title = 'Editar', $parameters = $centros, $attributes = ['class'=>'btn btn-info'])!!}
          </td>
        </tbody>
      @endforeach
    </table>
    {!!$users->render()!!}