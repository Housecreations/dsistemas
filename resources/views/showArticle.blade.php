@extends('admin.templates.productos')

@section('title', $article->name) 


@section('content') 
  
  
{{--{{$article->articlesDetails}}
   --}}
   <div class="items col-md-10">
    <ol class="breadcrumb bc text-center">
  <li><a href="/">Inicio</a></li>

    
    
  
    <li> <a href="/articulos/{{$article->category->name}}"> {{$article->category->name}}</a></li>
   
  
   
    <li class="active"> {{$article->name}}</li>
  <hr>
</ol>
   
  
   
   
     
   
   
  
  
  <div class="col-md-6 img-container">
  
  
   <div id="slider" class="flexslider">
                              <ul class="slides">
                                
    @foreach($article->images as $image)
                                 
                                 <li>
                                  <img src="/images/articles/{{$image->image_url}}" alt="Slide {{$image->id}}"/>
                                  
                              </li>
                              
                              @endforeach
                              
                          </ul>
                      </div>
                     
                <div id="carousel" class="flexslider">
                          <ul class="slides">
                         
                             
                 @foreach($article->images as $image)                 
                           <li>
                              <img src="/images/articles/{{$image->image_url}}" alt="Thumbnail {{$image->id}}"/>
                          </li>
                          
                          @endforeach
                         
                      </ul>
                  </div>       
                    
   </div>
  
  
  
   <div class="col-md-5 item-description">
      
      <span class="title">{{$article->name}}</span>
     <br>
      
      <span class="price">${{$article->price}} </span>
      <br>
      <span> Disponibilidad: </span>
      @if($article->stock > 0)
      
      <span> En existencia</span>
      @else
      <span> Agotado</span>
      
      @endif
      
      
      
      <div class="">
          
          
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
   
   
   
  <div class="panel panel-default">
   
   <div class="panel-heading" role="tab" id="heading1">
      
        <a class="nohover" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
         
        <h4 class="panel-title big">
        Descripción
        </h4>
       
        </a>
       </div>
    
    
     
     <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
      <div class="panel-body">
        
        <p>{{$article->description}}</p>   
        
      </div>
    </div>
    
    
    
    
  </div>
  
   
  

  </div>
          @if($article->stock > 0)
        <div class="agregar-carrito">
                   
                  
                   
                            
                   @include('in_shopping_carts.form', ['article' => $article])
                   
                </div> 
                @endif
      </div>
      
      
     
   </div>
   
   </div>
   
   
   
   
   
   
   
@endsection