@extends('admin.templates.principal')


@section('title', 'Agregar archivo')


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">

<a href="{{ route('admin.files.index')}}" class="button">Atrás</a>
    <hr>

{!! Form::open(['route' => 'admin.files.store', 'method' => 'POST', 'files' => true]) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre archivo') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del archivo']) !!}
</div>

<div class="form-group">
{!! Form::label('description', 'Descripción') !!}
{!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del archivo']) !!}
</div>



<div class="form-group">
    
 
 <label for="category">Categoria</label>
    <select class="form-control" required="required" id="category_id" name="category_id"><option selected="selected" value="">Seleccione una categoria</option>
  
       @foreach($categories as $category)  
   
             <option value="{{$category->id}}">{{$category->name}}</option> 
                
                @endforeach 
           </select>
  
</div>


<div class="form-group">
{!! Form::label('version', 'Versión') !!}
{!! Form::text('version', null, ['class' => 'form-control', 'required', 'placeholder' => 'Versión del archivo']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Archivos') !!}
    {!! Form::file('file', null, ['class' => 'form-control', 'required']) !!}
    
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection