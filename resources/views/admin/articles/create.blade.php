@extends('admin.templates.principal')


@section('title', 'Agregar articulo')


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">

{!! Form::open(['route' => 'admin.articles.store', 'method' => 'POST', 'files' => true]) !!}
<div class="form-group">
{!! Form::label('name', 'Nombre artículo') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del artículo']) !!}
</div>

<div class="form-group">
{!! Form::label('description', 'Descripción') !!}
{!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '20x5', 'required', 'placeholder' => 'Descripción del artículo']) !!}
</div>

{{--<div class="form-group">
    {!! Form::label('gender', 'Género') !!}
    {!! Form::select('gender', ['male' => 'Masculino', 'female' => 'Femenino'], null, ['class'=> 'form-control', 'placeholder' => 'Seleccione un genero', 'required'] ) !!}
    
</div>--}}

<div class="form-group">
    
   {{-- {!! Form::label('category', 'Categoria') !!}
    {!! Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria']) !!}
    --}}
     <label for="category">Categoria</label>
    <select class="form-control" required="required" id="category_id" name="category_id"><option selected="selected" value="">Seleccione una categoria</option>
    <option value="">--Masculino--</option>
       @foreach($categories as $category)  
         @if($category->gender == 'male') 
             <option value="{{$category->id}}">{{$category->name}}</option> 
                @endif    
                @endforeach 
            <option value="">--Femenino--</option>     
    @foreach($categories as $category)
          @if($category->gender == 'female')
            <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach 
                 <option value="">--Accesorios--</option>  
                @foreach($categories as $category)
          @if($category->gender == 'acc')
            <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach </select>
    
</div>


<div class="form-group">
{!! Form::label('stock', 'Cantidad disponible') !!}
{!! Form::number('stock', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
{!! Form::label('price', 'Precio') !!}
{!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
{!! Form::label('discount', '% de descuento') !!}
{!! Form::number('discount', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Imagen del artículo') !!}
    {!! Form::file('image') !!}
    
</div>


<div class="form-group text-center">
    
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
    
</div>

{!! Form::close() !!}

    </div>
</div>
@endsection