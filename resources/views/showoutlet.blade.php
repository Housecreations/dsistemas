@extends('admin.templates.productos')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', $articles[0]->category->name) 
@endif


@section('content') 
   <div class="col-md-1"></div>
    <div class="items col-md-10 col-sm-10"> 
   
      
    @if(sizeof($articles)==0)
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron artículos</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    <li class="active">Descuentos</li>
  
</ol>
       
     @foreach($articles as $article)
    
  <div class="col-md-6 col-sm-6 item-content">
    
        
        
        
        
        
        
        
        
    
  
        
   
		
        
         <a href="{{ route('mostrar.articulo', [$article->category->name, $article->slug])}}" >
   <div class="grid mask">
						<figure>
							<img class="img-responsive" src="/images/articles/{{$article->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$article->name}} | {{$article->price}} Bs </h5>
								
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
    
        </a>
        
   
    
        
        
        
        
        
    
    
    
 
   
    </div>
     
    @endforeach
  
  @endif
  
   </div>
   
@endsection