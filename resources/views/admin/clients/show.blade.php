@extends('admin.templates.productos')
@section('title', "Clientes") 


@section('content') 

<div class="items col-md-10 col-sm-10 col-xs-10">
    <h4 class="text-center">Nuestros clientes</h4>
        <hr>
    @foreach($clients as $client)
    
        
        <div class="col-md-4 item-content client top-space col-sm-4 col-xs-6">
        
            
            <img src="/images/clients/{{$client->logo_url}}" alt="">
            <h5 class=" title text-center">{{$client->name}}</h5>
            <p class="text-center client-message">{{$client->message}}</p>
    
        </div>
    @endforeach
    
</div>


@endsection