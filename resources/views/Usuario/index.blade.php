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


<a href="{{ url('Usuario/create') }}"  class="btn btn-success">Registrar Nuevo Empleado</a>
<br>
</br>


<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Acciones</th>
        </tr>
    </thead>


    <tbody>
        @foreach( $Usuario as $Usuario )
        <tr>
            <td>{{ $Usuario->id }}</td>
            <td>{{ $Usuario->User }}</td>
            <td>{{ $Usuario->Nombre }}</td>
            <td>{{ $Usuario->Telefono }}</td>
            <td>{{ $Usuario->Direccion }}</td>
            <td>{{ $Usuario->Email }}</td>
            <td>{{ $Usuario->Contraseña }}</td>
            <td>
                
            <a href="{{ url('/Usuario/'.$Usuario->id.'/edit') }}" class="btn btn-warning">

            Editar 
            </a>
            | 
                
            <form action="{{ url('/Usuario/'.$Usuario->id) }}" class="d-inline" method="post">
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