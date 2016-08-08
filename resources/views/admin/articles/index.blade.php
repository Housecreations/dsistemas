@extends('admin.templates.principal')


@section('title', 'Lista de artículos')


@section('content')


 <div class="container-fluid users">    
<div class="col-md-1"></div>
<div class="col-md-10">

    <a href="{{ route('admin.index')}}" class="button">Atrás</a>
     <a href="{{ route('admin.articles.create') }}" class='button'>Nuevo Artículo</a>



<!-- Buscador de articulos -->

{!! Form::open(['route' => 'admin.articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="input-group">
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulo...', 'aria-describedby' => 'searchArticles']) !!}

   
    <span class="input-group-addon" id="searchArticles"><span class="glyphicon glyphicon-search"  aria-hidden="true"></span></span>
    </div>
{!! Form::close() !!}
<!-- Fin buscador de usuarios -->


<hr>
<table class='table table-hover'>
    
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        
        <th>Categoría</th>
        <th>Disponibles</th>
        <th>Descuento (%)</th>
        <th>Precio</th>
        <th>Acciones</th>
    </thead>
    <tbody>
       @foreach($articles as $article)
           <tr>
               <td>{{$article->id}}</td>
               <td>{{$article->name}}</td>
               
                 <td>{{$article->category->name}}</td>
                  <td>{{$article->stock}}</td>
                   <td>{{$article->discount}}</td>
                    <td>{{$article->price}}</td>
        
            
                <td>
                <a href="{{ route('admin.articles.edit', $article->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a></td>
               
               
               
               
               
               
           </tr>
       @endforeach 
    </tbody>
    
</table>
<div class="text-center">
  {!! $articles->render() !!} 
</div>

     </div>
</div>
@endsection