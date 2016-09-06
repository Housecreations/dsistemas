@extends('admin.templates.principal')


@section('title', 'Outlet')


@section('content')

<div class="col-md-12 users">

<div class="col-md-5"></div>
<div class="col-md-2">
<a href="{{route('admin.outlet.index')}}">
<div class="text-center button">Volver</div>
</a></div>
<br>
<h4 class="text-center">Seleccione un artículo para eliminarlo de descuentos</h4>
<hr>

<div class="col-md-12"> 

    @foreach($articles as $article)
    
    <div class="col-md-2 item-content">
   
    <a class="" href="{{ route('admin.outlet.sus', $article->id)}}">
   
    <div class="templatemo-gallery-item">
							<img src="/images/articles/{{$article->images[0]->image_url}}" alt="Gallery Item" class="img-responsive">
							
								
									<h4 class="templatemo-white-text">{{$article->name}}</h4>
									<h4 class="templatemo-gold-text">{{$article->price}} bs</h4>
								
						
						</div>	
    
        </a>
    
    
    
 
   
    </div>
     
    @endforeach

</div>

</div>



@endsection