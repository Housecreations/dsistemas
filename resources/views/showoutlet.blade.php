@extends('admin.templates.main')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', $articles[0]->category->name) 
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

    <li class="active">Outlet</li>
  
</ol>
       
     @foreach($articles as $article)
    
    <div class="col-md-4 item-content">
    @if($article->category->gender == 'male')
    <a class="" href="{{ route('hombres.mostrarArticulo', ['caballeros', $article->category->name, $article->slug])}}">
    @endif
     @if($article->category->gender == 'female')
    <a class="" href="{{ route('hombres.mostrarArticulo', ['damas', $article->category->name, $article->slug])}}">
    @endif
    @if($article->category->gender == 'acc')
    <a class="" href="{{ route('hombres.mostrarArticulo', ['accesorios', $article->category->name, $article->slug])}}">
    @endif
    <div class="templatemo-gallery-item">
							<img src="/images/articles/{{$article->articlesDetails[0]->images[0]->image_URL}}" alt="Gallery Item" class="img-responsive">
							<div class="templatemo-gallery-image-overlay"></div>
							<div class="templatemo-gallery-image-description text-right">
								<blockquote class="blockquote-reverse">
									<h4 class="templatemo-white-text">{{$article->name}}</h4>
									<h4 class="templatemo-gold-text">{{$article->articlesDetails[0]->price}} bs</h4>
								</blockquote>
							</div>
						</div>	
    
        </a>
    
    
    
 
   
    </div>
     
    @endforeach
  
  @endif
  
   </div>
   
@endsection