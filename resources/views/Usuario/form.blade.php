<h1>{{ $modo }} empleado </h1>
<form action="{{ url('/Usuario') }}" method="post">
<!--llave de seguridad laravel-->
@csrf

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>

@endif



<div class="form-group">
<label for="User">Usuario</label>
<!-- El espacio isset es para hacer un condicioinal, si el dato esta, lo puede imprimir, si no solamente deja el espacio vacio-->
<input type="text" class="form-control" name="User" value="{{ isset($Usuario->User)?$Usuario->User:old('User') }}" id="User">
</div>
<!--El attributo old, es para recordar el campo viejo que se tomó en cuenta  ala hora de escribir-->
<div class="form-group">
<label for="Nombre">Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($Usuario->Nombre)?$Usuario->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
<label for="Telefono">Telefono</label>
<input type="text" class="form-control" name="Telefono" value="{{ isset($Usuario->Telefono)?$Usuario->Telefono:old('Telefono') }}" id="Telefono">
</div>

<div class="form-group">
<label for="Direccion">Direccion</label>
<input type="text" class="form-control" name="Direccion" value="{{ isset($Usuario->Direccion)?$Usuario->Direccion:old('Direccion') }}" id="Direccion">
</div>

<div class="form-group">
<label for="Email">Email</label>
<input type="text" class="form-control" name="Email" value="{{ isset($Usuario->Email)?$Usuario->Email:old('Email') }}" id="Email">
</div>

<div class="form-group">
<label for="Contraseña">Contraseña</label>
<input type="text" class="form-control" name="Contraseña" value="{{ isset($Usuario->Contraseña)?$Usuario->Contraseña:old('Contraseña') }}" id="Contraseña" maxlength="6">
</div>

<br>
<div class="form-group">
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('Usuario') }}">Regresar</a>
</div>

</form>

