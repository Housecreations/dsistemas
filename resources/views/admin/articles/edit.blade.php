@extends('admin.templates.principal')


@section('title', 'Editar artículo ' .$article->name )


@section('content')
<div class="container-fluid">    
<div class="col-md-4"></div>
<div class="col-md-4 users">
    
    <a href="{{ route('admin.articles.index')}}" class="button">Atrás</a>
    <hr>
    
{!! Form::open(['route' => ['admin.articles.update', $article->id], 'method' => 'PUT']) !!}

<div class="form-group">
    
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', $article->name, ['class' => 'form-control', 'placeholder' => 'Nombre del artículo', 'required']) !!}
    
</div>
    
    
    <div class="form-group">
    
   {!! Form::label('description', 'Descripción') !!}
   {!! Form::textarea('description', $article->description, ['class' => 'form-control', 'placeholder' => 'Descripción', 'required']) !!}
    
</div>  
    

<div class="form-group">
 
     <label for="category">Categoria</label>
    <select class="form-control" required="required" id="category_id" name="category_id">
   
       @foreach($categories as $category)  
        
        

        
        
            @if($category->id == $article->category->id)
            <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
        @else
             <option value="{{$category->id}}">{{$category->name}}</option> 
        @endif
                
      
                
        @endforeach 
            
        
        </select>
    
</div>

     <div class="form-group">
{!! Form::label('stock', 'Cantidad disponible') !!}
{!! Form::number('stock', $article->stock, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
{!! Form::label('price', 'Precio') !!}
{!! Form::number('price', $article->price, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
{!! Form::label('discount', '% de descuento') !!}
{!! Form::number('discount', $article->discount, ['class' => 'form-control', 'required']) !!}
</div>




<div class="form-group">
    
    {!! Form::submit('Editar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}

    </div>
</div>
@endsection