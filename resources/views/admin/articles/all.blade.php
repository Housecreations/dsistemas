@extends('admin.templates.principal')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', 'Todos los artículos') 
@endif


@section('content') 
   <div class="col-md-1"></div>
    <div class="items col-md-10"> 
   
      
    @if(sizeof($articles)==0)
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron artículos</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>
  <li class="active">Todos</li>

  
</ol>
       
     @foreach($articles as $article)
    
    <div class="col-md-4 item-content col-xs-6">
   
    <a class="" href="{{ route('hombres.mostrarArticulo', [$article->category->name, $article->slug])}}">
   
   
    <div class="templatemo-gallery-item">
							<img src="/images/articles/{{$article->images[0]->image_url}}" alt="Gallery Item" class="img-responsive">
							<div class="templatemo-gallery-image-overlay"></div>
							<div class="templatemo-gallery-image-description text-right">
								<blockquote class="blockquote-reverse">
									<h4 class="templatemo-white-text">{{$article->name}}</h4>
									<h4 class="templatemo-gold-text">${{$article->price}} </h4>
								</blockquote>
							</div>
						</div>	
    
        </a>
    
    
    
 
   
    </div>
     
    @endforeach
  
  @endif
  

  
   </div>
    <div class="col-md-12 col-xs-12">
     <div class="text-center">
    {!! $articles->render() !!}
</div>
</div>
@endsection