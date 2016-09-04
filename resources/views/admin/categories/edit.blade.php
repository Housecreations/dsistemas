@extends('admin.templates.principal')


@section('title', 'Editar área ' .$category->name )


@section('content')
 <div class="container-fluid users">    
<div class="col-md-4"></div>
<div class="col-md-4">
        
         <a href="{{ route('admin.categories.index')}}" class="button">Atrás</a>
        <hr> 
{!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
    
</div>



<div class="form-group text-center">
    
    {!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
    
</div>


{!! Form::close() !!}
</div>
        </div>

@endsection