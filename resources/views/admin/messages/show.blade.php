@extends('admin.templates.principal')

@section('title', 'Mensajes') 


@section('content') 
<div class="container-fluid users msg">



<div class="col-md-1"></div>

<div class="col-md-10">

<a href="{{ route('admin.messages.index')}}" class="button">Atrás</a>
<br>
<br>

{{$message->subject}}
<hr>

    <span class="bold">{{$message->name}}</span><span class="grey"> &lt;{{$message->email}}&gt;</span>

<div class="body-message">
{{$message->message}}
</div>
</div>
</div>
@endsection