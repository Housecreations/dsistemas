@extends('admin.templates.productos')
 @if(sizeof($categoriescat)==0)
 @section('title', 'No se encontraron áreas') 
 @else
@section('title', 'Áreas') 
@endif


@section('content') 
   
    <div class="items col-md-10 col-sm-10 col-xs-10 card"> 
   
      
    @if(sizeof($categoriescat)==0)
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>
<hr>
  
</ol>

<h4 class="text-center">Lo sentimos, no se encontraron áreas</h4>

</div>
     @else
       
      
       <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    <li class="active">Áreas</li>
  <hr>
</ol>
       
     @foreach($categoriescat as $category)
    @if(sizeof($category->articles) > 0)
    <div class="col-md-6 col-sm-6 col-xs-12 item-content">
    
          
   
			    	    
         <a href="/articulos/{{$category->slug}}" >
   <div class="grid mask">
                   
						<figure>
							<img class="img-responsive" src="/images/articles/{{$category->articles[0]->images[0]->image_url}}" alt="">
							<figcaption>
								<h5>{{$category->name}}</h5>
								
								
							</figcaption><!-- /figcaption -->
						</figure><!-- /figure -->
			    	</div><!-- /grid-mask -->
    
        </a>
        
        
        
   
    
        
        
        
        
        
    
    
    
 
   
    </div>
     @endif
    @endforeach
  
  @endif
  
   </div>
   
@endsection