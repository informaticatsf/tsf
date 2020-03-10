<div class="form-group">
    {{ Form::label('name', 'Nombre ') }}
    {{ Form::text('name', null, ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('passwords', 'Contraseña ') }}
    {{ Form::password('passwords', ['class'=>'form-control']) }}

</div>
 <div class="form-group">
    {{ Form::label('email', 'Email Antiguo') }}
    {{ Form::text('email', null, ['class'=>'form-control', 'readonly' => 'readonly']) }}

    {{ Form::label('email2', 'Email Nuevo') }}
    {{ Form::text('email2', null, ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('dpi', 'DPI ') }}
    {{ Form::text('dpi', $datos[0]->dpi, ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('apellido', 'Apellido ') }}
    {{ Form::text('apellido', $datos[0]->apellido, ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('sexo', 'Sexo ') }}
    {{ Form::select('sexo',  array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), $datos[0]->sexo, ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('fechanacimiento', 'Fecha de Nacimiento ') }}
    {{ Form::date('fechanacimiento', date('Y-m-d', strtotime($datos[0]->fechanacimiento)), ['class'=>'form-control']) }}

</div>
<div class="form-group">
    {{ Form::label('direccion', 'Direccion ') }}
    {{ Form::text('direccion', $datos[0]->direccion, ['class'=>'form-control']) }}

</div>
<hr>
 <h3>Lista de roles</h3>
 <div class="form-group">
     <ul class="list-unstyled">
         @foreach($roles as $role)
            <li>
                <label>
                    {{ Form::checkbox('roles[]', $role->id, null) }}
                    {{ $role->name }}
                    <em>({{ $role->description ?: 'N/A' }})</em>
                </label>
            </li>
         @endforeach
     </ul>
 </div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class'=>'btn btn-lg btn-primary']) }}
    <a class="btn btn-lg btn-danger float-right" href="{{ route('users.index') }}">Cancelar</a>
</div>
