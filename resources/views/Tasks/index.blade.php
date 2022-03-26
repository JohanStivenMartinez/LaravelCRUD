Mostrar Tasks

@extends('layouts.app')

@section('content')
<div class="container">


    <!--Condicional para mandar mensajes-->
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
 
    <span aria-hidden="true">&times;</span>

</button>
    @endif


</div>


<a href="{{ url('Tasks/create') }}"  class="btn btn-success">Registrar Nueva Tarea</a>
<br>
</br>


<table class="table table-dark">

    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>


    <tbody>
        @foreach( $Tasks as $Tasks )
        <tr>
            <td>{{ $Tasks->id }}</td>
            <td>{{ $Tasks->Nombre }}</td>
            <td>{{ $Tasks->FechaInicio }}</td>
            <td>{{ $Tasks->FechaFin }}</td>
            <td>{{ $Tasks->Estado }}</td>
            <td>
                
                <a href="{{ url('Tasks/'.$Tasks->id.'/edit') }}" class="btn btn-warning">

            Editar 
            </a>
            | 
                
            <form action="{{ url('Tasks/'.$Tasks->id) }}" class="d-inline" method="post">
            @csrf
            <!--Cambio para el metodo, asi toma el DELETE y no el post-->
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" 
            value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection