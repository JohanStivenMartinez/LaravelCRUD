@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/Tasks/'.$Tasks->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('Tasks.formT',['modo'=>'Editar'])


</form>

</div>
@endsection