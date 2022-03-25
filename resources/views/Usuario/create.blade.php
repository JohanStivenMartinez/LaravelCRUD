@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/Usuario') }}" method="post">
<!--llave de seguridad laravel-->
@csrf
<!--Modos para editar el form-->
@include('Usuario.form',['modo'=>'Crear'])
</form>

</div>
@endsection