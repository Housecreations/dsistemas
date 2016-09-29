@extends('admin.templates.principal')


@section('title', 'Editar tag ' .$tag->name )


@section('content')
 <div class="container-fluid users">    
<div class="col-md-4"></div>
<div class="col-md-4">
        
         <a href="{{ route('admin.tags.index')}}" class="button">Atrás</a>
        <hr> 
{!! Form::open(['route' => ['admin.tags.update', $tag->id], 'method' => 'PUT']) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre del tag') !!}
   {!! Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre del tag', 'required']) !!}
    
</div>



<div class="form-group text-center">
    
    {!! Form::submit('Editar tag', ['class' => 'cart-button'])!!}
    
</div>


{!! Form::close() !!}
</div>
        </div>

@endsection