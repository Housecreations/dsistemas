@extends('admin.templates.principal')

@section('title', 'Mensajes') 


@section('content') 
<div class="container-fluid users msg">



<div class="col-md-1"></div>

<div class="col-md-10 card">

<a href="{{ route('admin.messages.index')}}" class="button button-sm">Atrás</a>
<hr>

<div class="col-md-4 col-sm-4 col-xs-4">Asunto: {{$message->subject}}</div> <div class="col-md-8 col-sm-8 col-xs-8 text-right">Fecha: {{$message->created_at}}</div>
<br>
<hr>
<div class="col-md-6">De: <span class="bold">{{$message->name}}</span><span class="grey"> &lt;{{$message->email}}&gt;</span>
    </div>
<br>
<hr>
<div class="col-md-12">
<h4>Mensaje</h4>

<div class="body-message">
{{$message->message}}
</div>
</div>
</div>
</div>
@endsection