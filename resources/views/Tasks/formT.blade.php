Formulario Task

<h1>{{ $modo }} Tareas </h1>
<form action="{{ url('/Tasks') }}" method="post">
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
<label for="Nombre">Nombre</label>
<!-- El espacio isset es para hacer un condicioinal, si el dato esta, lo puede imprimir, si no solamente deja el espacio vacio-->
<input type="text" class="form-control" name="Nombre" value="{{ isset($Tasks->Nombre)?$Tasks->Nombre:old('Nombre') }}" id="Nombre">
</div>
<!--El attributo old, es para recordar el campo viejo que se tomó en cuenta  ala hora de escribir-->
<div class="form-group">
<label for="FechaInicio">FechaInicio</label>
<input type="text" class="form-control" name="FechaInicio" value="{{ isset($Tasks->FechaInicio)?$Tasks->FechaInicio:old('FechaInicio') }}" id="FechaInicio">
</div>

<div class="form-group">
<label for="FechaFin">FechaFin</label>
<input type="text" class="form-control" name="FechaFin" value="{{ isset($Tasks->FechaFin)?$Tasks->FechaFin:old('FechaFin') }}" id="FechaFin">
</div>

<div class="form-group">
<label for="Estado">Estado</label>
<input type="text" class="form-control" name="Estado" value="{{ isset($Tasks->Estado)?$Tasks->Estado:old('Estado') }}" id="Estado">
</div>

<br>
<div class="form-group">
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('Tasks') }}">Regresar</a>
</div>

</form>

