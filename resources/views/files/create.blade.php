@extends('admin.templates.principal')


@section('title', 'Agregar archivo')


@section('content')
<div class="items-no-nav col-md-10 col-sm-10 col-xs-12 card">    

<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">

<a href="{{ route('admin.files.index')}}" class="button button-sm">Atrás</a>
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
{!! Form::text('version', null, ['class' => 'form-control', 'required', 'placeholder' => 'Versión del archivo (1.4, 1.0, 2.3)']) !!}
</div>

<div class="form-group">
{!! Form::label('os', 'S.O.') !!}
{!! Form::text('os', null, ['class' => 'form-control', 'required', 'placeholder' => 'Sistema operativo (windows 7-32bits, linux)']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Archivos') !!}
    {!! Form::file('file', null, ['class' => 'form-control', 'required']) !!}
    
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Cargar archivo', ['class' => 'button'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection