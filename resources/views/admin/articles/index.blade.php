@extends('admin.templates.principal')


@section('title', 'Lista de artículos')


@section('content')


 <div class="container-fluid ">    
<div class="col-md-1"></div>
<div class="col-md-10 users">

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

    
  
       @foreach($articles as $article)
           
             
            <div class="col-md-4 item-content">  
            <h5>{{$article->name}}</h5>
            <img src="/images/articles/{{$article->images[0]->image_url}}" alt="">  
               <span>{{$article->price}}</span>
                <span>Unidades: {{$article->stock}}</span>
                <span>% descuento: {{$article->discount}}</span>
                <hr>
                 <span>{{$article->category->name}}</span>
                 <hr>
                  
                   
                 
        
            
               
                <a href="{{ route('admin.articles.images', $article->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-photo fa-stack-1x fa-inverse"></i>
                    </span></a>
                
                
                <a href="{{ route('admin.articles.edit', $article->id)}}" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                    </span></a>
               <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class=''><span class='fa-stack fa-lg ' aria-hidden='true'>
                     <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                    </span></a>
                
                </div>
              
                
               
               
               
               
               
               
               
          
       @endforeach 
  
    

<div class="text-center">
  {!! $articles->render() !!} 
</div>

     </div>
</div>
@endsection