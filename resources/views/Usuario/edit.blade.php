@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/Usuario/'.$Usuario->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('Usuario.form',['modo'=>'Editar']);


</form>

</div>
@endsection

