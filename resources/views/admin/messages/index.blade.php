@extends('admin.templates.principal')

@section('title', 'Mensajes') 


@section('content') 





<div class="container-fluid users">
<div class="col-md-1"></div>

<div class="col-md-10">

<a href="{{ route('admin.index')}}" class="button">Atrás</a>
<hr>

@if(sizeof($messages) == 0)

<h4 class='text-center'>No hay mensajes para mostrar</h4>

@else
<table class='table table-hover'>
   <thead>
    <th>Correo</th>
    <th>Asunto</th>
    <th>Acciones</th>
</thead>
<tbody>
@foreach($messages as $message)



@if($message->read == 'no')
<tr class="unread" data-href="{{route('admin.messages.show', $message->id)}}">
@else

<tr data-href="{{route('admin.messages.show', $message->id)}}">
@endif



<td>{{$message->email}}</td>
<td>{{$message->subject}}</td>
<td><a href="{{route('admin.messages.destroy', $message->id)}}" class="button">Eliminar</a></td>

    </div>

</tr>




@endforeach
</tbody>
</table>
@endif
</div>

</div>
@endsection



