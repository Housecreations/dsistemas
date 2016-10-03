@extends('admin.templates.principal')

@section('title', 'Imagenes inicio') 


@section('content') 






<div class="items-no-nav col-md-10 col-sm-10 col-xs-10 card">



   
   
    <a href="{{ route('admin.index')}}" class="button button-sm three">Atrás</a>
         <a href="{{ route('admin.front.mas')}}" class="button button-sm three">Nueva imagen</a>
         <a href="{{ route('admin.front.menos')}}" class="button button-sm three">Eliminar imagen</a>
<hr>
   




<div class="row">
    
    
    
@foreach($images as $image)

<div class="col-md-6 col-sm-6 col-xs-12 admin-item-content">
<div class="image">
    <img src="/images/slider/{{$image->image_url}}" alt="">
</div>
<div class="col-md-11">
{!! Form::open(['route' => ['admin.front.update', $image->id], 'method' => 'PUT', 'files' => true]) !!}

<div class="form-group">
    
   {!! Form::label('imagen', 'Imagen') !!}
   {!! Form::text('imagen', $image->image_url, ['class' => 'form-control', 'placeholder' => 'URL imagen']) !!}
    
</div>

<div class="form-group">
    
   {!! Form::label('url_to', 'URL a redirigir') !!}
   {!! Form::text('url_to', $image->url_to, ['class' => 'form-control', 'placeholder' => 'www.ejemplo.com/ruta-a-mostrar']) !!}
    
</div>


<div class="form-group">
    {!! Form::label('image', 'Cargar imagen') !!}
    {!! Form::file('image') !!}
    
</div>
</div>
<div class="col-md-12">
<div class="form-group">
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>

</div>

{!! Form::close() !!}

</div>
  @endforeach 
    
    
    
    
    
    
    
  


@endsection