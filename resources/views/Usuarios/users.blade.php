<table class="table">
			<thead>
				<th>Foto</th>
				<th>Identificacion</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Sexo</th>
				<th>Telefono</th>
				<th>Correo Electronico</th>
				<th>Rol</th>
				<th>Operacion</th>
			</thead>
			@foreach($users as $user)
				<tbody>
					<td>{{$user->foto</td>
					<td>{{$user->identificacion_Usuario}}</td>
					<td>{{$user->nombre_Usuario}}</td>
					<td>{{$user->apellido_Usuario}}</td>
					<td>{{$user->sexo_Usuario}}</td>
					<td>{{$user->telefono_Usuario}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->rol_Usuario}}</td>
					<td>
						{!!link_to_route('Usuarios.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
					</td>
				</tbody>
			@endforeach
		</table>
		{!!$users->render()!!}