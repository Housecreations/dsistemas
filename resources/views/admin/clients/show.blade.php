@extends('admin.templates.productos')
@section('title', "Clientes") 


@section('content') 

<div class="centrar-con-barra">
    
    @foreach($clients as $client)
    
        <div class="col-md-4">
        
            <h5>{{$client->name}}</h5>
            <img src="/images/clients/{{$client->logo_url}}" alt="">
            <span>{{$client->message}}</span>
    
        </div>
    @endforeach
    
</div>


@endsection