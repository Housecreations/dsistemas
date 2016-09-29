@extends('admin.templates.principal')


@section('title', 'Imágenes ' .$article->name )


@section('content')
<div class="container-fluid users">    
<div class="col-md-2"></div>
<div class="col-md-8 card bottom-space">
    
    <a href="{{ route('admin.articles.index')}}" class="button">Atrás</a>
    <hr>
    {!! Form::open(['route' => ['admin.articles.images.new', $article->id], 'method' => 'POST', 'files' => true]) !!}
    
    <div class="form-group">
    {!! Form::label('image', 'Imagen del artículo') !!}
    {!! Form::file('image') !!}
    
</div>
    <div class="form-group">
    
    {!! Form::submit('Agregar nueva imagen', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}
    
    @foreach($article->images as $image)
    <div class="col-md-4">
{!! Form::open(['route' => ['admin.articles.images.delete', $article->id, $image->id], 'method' => 'DELETE']) !!}


    <div class="image">
        
        <img src="/images/articles/{{$image->image_url}}" alt="">
        
    </div>



<div class="form-group">
    
    {!! Form::submit('Eliminar', ['class' => 'button'])!!}
    
</div>


{!! Form::close() !!}
</div>
@endforeach
    </div>
</div>
@endsection