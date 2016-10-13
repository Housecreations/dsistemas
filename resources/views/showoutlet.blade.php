@extends('admin.templates.productos')
 @if(sizeof($articles)==0)
 @section('title', 'No se encontraron articulos') 
 @else
@section('title', 'En descuento') 
@endif


@section('content') 
   <div class="col-md-1"></div>
    <div class="items col-md-10 col-sm-10 card"> 
   
      
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
  <hr>
</ol>
       
     @foreach($articles as $article)
    
  <div class="col-md-6 col-sm-6 item-content">
    
        
        
        
        
        
        
        
        
    
  
        
   
		
        
         <a href="{{ route('mostrar.articulo', [$article->category->slug, $article->slug])}}" >
   <div class="grid mask">
                    <div class="oferta">{{$article->discount}}% de descuento</div>
						<figure>
							<img class="img-responsive" src="/images/articles/{{$article->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$article->name}}</h5>
								<h5>{{$article->price_now}} Bs</h5>
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
    
        </a>
        
   
    
        
        
        
        
        
    
    
    
 
   
    </div>
     
    @endforeach
  
  @endif
  
   </div>
   
@endsection