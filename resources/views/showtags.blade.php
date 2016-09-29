@extends('admin.templates.productos')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', $tag->name) 
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

    <li class="active">{{$tag->name}}</li>
  
</ol>
       
     @foreach($articles as $article)
    
  <div class="col-md-6 item-content">
    
        
        
        
        
        
        
        
        
    
  
        
   
			    
			    	{{--	<div class="grid mask">
						<figure>
							<img class="img-responsive" src="/images/articles/{{$article->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$article->name}} ! {{$article->price}} </h5>
								<a data-toggle="modal" href="{{ route('mostrar.articulo', [$article->category->name, $article->slug])}}" class="btn btn-primary btn-lg">Ver mas</a>
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
		
        --}}
        
        <a href="{{ route('mostrar.articulo', [$article->category->name, $article->slug])}}" >
   <div class="grid mask">
						<figure>
							<img class="img-responsive" src="/images/articles/{{$article->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$article->name}} ! {{$article->price}} </h5>
								
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
    
        </a>
        
        
        
        
    
    
    
 
   
    </div>
     
    @endforeach
  
  @endif
  
   </div>
   
@endsection