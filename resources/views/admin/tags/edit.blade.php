@extends('admin.templates.principal')


@section('title', 'Editar tag ' .$tag->name )


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">    

<div class="col-md-6 col-md-offset-3">
        
         <a href="{{ route('admin.tags.index')}}" class="button button-sm">Atrás</a>
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