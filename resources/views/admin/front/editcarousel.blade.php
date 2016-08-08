@extends('admin.templates.principal')

@section('title', 'Imagenes inicio') 


@section('content') 






<div class="container-fluid users">


<div class="row">
   <div class="col-md-2"></div>
    <div class="col-md-8">
    <a href="{{ route('admin.index')}}" class="button">Atrás</a>
         <a href="{{ route('admin.front.mas')}}" class="button">Más</a>
         <a href="{{ route('admin.front.menos')}}" class="button">Menos</a>
<hr>
    </div>
</div>



<div class="row">
    
    
    
@foreach($images as $image)

<div class="col-md-4">
<div class="image">
    <img src="/images/slider/{{$image->image_url}}" alt="">
</div>
<div class="col-md-11">
{!! Form::open(['route' => ['admin.front.update', $image->id], 'method' => 'PUT', 'files' => true]) !!}

<div class="form-group">
    
   {!! Form::label('imagen', 'URL de la imagen') !!}
   {!! Form::text('imagen', $image->image_url, ['class' => 'form-control', 'placeholder' => 'URL imagen', 'required']) !!}
    
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
<h5><span>Puede usar una URL o cargar la imagen usted mismo</span></h5>
</div>

{!! Form::close() !!}

</div>
  @endforeach 
    
    
    
    
    
    
    
  


@endsection